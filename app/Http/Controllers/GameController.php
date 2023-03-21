<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Game;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function addGame(Request $request)
    {
        if ($request->isMethod('get')) {
            $devices = Device::get();
            $data = compact('devices');
            return view('games.addGame')->with($data);
        } else {
            $game = new Game();
            $game->name = $request['name'];
            if (!empty($request['other_device'])) {
                $device = new Device();
                $device->name = $request['other_device'];
                $device->save();

                $newDevice = Device::where('name', $request['other_device'])->first();

                $game->device = $newDevice->id;
            } else {
                $game->device = $request['device'];
            }
            if (!empty($request->file('image'))) {
                $game_image = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('uploads', $game_image, 'public');

                $game->image = $game_image;
            } else {
                $game->image = null;
            }
            $game->user_id = Auth::id();
            $game->save();

            return redirect()->route('dashboard');
        }
    }

    public function allGames()
    {
        $devices = Device::get();
        $games = Game::paginate(40);
        $data = compact('games', 'devices');
        return view('games.allGames')->with($data);
    }

    public function allGamesByDevice($device)
    {
        $currentDevice = Device::where('name', $device)->first();
        $devices = Device::get();
        $games = Game::where('device', $currentDevice->id)->paginate(40);
        $data = compact('games', 'devices');
        return view('games.allGames')->with($data);
    }

    public function viewGames()
    {
        $games = Game::orderBy('updated_at', 'desc')->paginate(10);
        $data = compact('games');
        return view('admin.viewGames')->with($data);
    }

    public function viewGamesSearch(Request $request)
    {
        if ($request['search']) {
            $search = $request['search'];
            $games = Game::where('name', 'LIKE', '%' . $search . '%')->orderBy('updated_at', 'desc')->get();
            $data = compact('games');
            return view('admin.viewGames')->with($data);
        } else {
            return redirect()->route('view-games');
        }
    }

    public function editGame($id)
    {
        $devices = Device::get();
        $game = Game::where('id', $id)->first();
        $data = compact('devices', 'game');
        return view('games.addGame')->with($data);
    }

    public function updateGame($id, Request $request)
    {
        $game = Game::where('id', $id)->first();
        $game->name = $request['name'];
        if (!empty($request['other_device'])) {
            $device = new Device();
            $device->name = $request['other_device'];
            $device->save();

            $newDevice = Device::where('name', $request['other_device'])->first();

            $game->device = $newDevice->id;
        } else {
            $game->device = $request['device'];
        }
        if (!empty($request->file('image'))) {
            $game_image = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $game_image, 'public');

            $game->image = $game_image;
        } else {
            $game->image = null;
        }
        $game->user_id = Auth::id();
        $game->save();

        return redirect()->route('view-games');
    }

    public function deleteGame($id)
    {
        $game = Game::where('id', $id)->first();
        $game->delete();
        return redirect()->route('view-games');
    }

    public function updateGameStatus($id)
    {
        $game = Game::where('id', $id)->first();
        if ($game->status == 'PUBLISHED') {
            $game->status = 'DRAFT';
        } else {
            $game->status = 'PUBLISHED';
        }
        $game->save();
        return redirect()->route('view-games');
    }
}