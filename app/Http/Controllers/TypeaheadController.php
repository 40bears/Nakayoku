<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;

class TypeaheadController extends Controller
{
    public function action(Request $request)
    {
        $data = $request->all();
        $query = $data['query'];
        $filter_data = Game::where('name', 'LIKE', '%' . $query . '%')->with('devices')->get();

        return response()->json($filter_data);
    }

    public function searchUsers(Request $request)
    {
        $data = $request->all();
        $query = $data['query'];
        $filter_data = User::where('display_name', 'LIKE', '%' . $query . '%')
            ->orWhere('first_name', 'LIKE', '%' . $query . '%')
            ->orWhere('last_name', 'LIKE', '%' . $query . '%')
            ->take(10)->get();
        return response()->json($filter_data);
    }
}
