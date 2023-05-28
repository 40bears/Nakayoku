<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IdVerificationController extends Controller
{
    public function viewIdApprovals()
    {
        $users = User::orderBy('updated_at', 'desc')->paginate(20);
        $data = compact('users');
        return view('admin.idApprovals')->with($data);
    }

    public function viewIdApprovalsSearch(Request $request)
    {
        if ($request['search']) {
            $search = $request['search'];
            $users = User::where('display_name', 'LIKE', '%' . $search . '%')
                ->orwhere('first_name', 'LIKE', '%' . $search . '%')
                ->orwhere('last_name', 'LIKE', '%' . $search . '%')
                ->orwhere('document_verification', 'LIKE', '%' . $search . '%')
                ->orwhere('document_type', 'LIKE', '%' . $search . '%')
                ->orwhere('updated_at', 'LIKE', '%' . $search . '%')
                ->paginate(20);
            $data = compact('users');
            return view('admin.idApprovals')->with($data);
        } else {
            return redirect()->route('id-approvals');
        }
    }

    public function viewIdApprovalDocument($id)
    {
        $user = User::where('id', $id)->first();
        $data = compact('user');
        return view('admin.idApprovalDocument')->with($data);
    }

    public function updateIdApprovalStatus($id, $approval)
    {
        $user = User::where('id', $id)->first();
        if ($approval == 1) {
            $user->document_verification = 'VERIFIED';
        } else {
            $user->document_verification = 'NOT_VERIFIED';
        }
        $user->save();

        return redirect()->route('id-approvals');
    }
}
