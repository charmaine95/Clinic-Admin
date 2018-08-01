<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adopt;

class AdoptController extends Controller
{
    public function list()
    {
        $adopts = Adopt::all();

        return view('dashboard.admin.adopt.list', compact('adopts'));
    }

    public function adoptRequest()
    {
        $adopts = Adopt::all();

        return view('dashboard.admin.adopt.request', compact('adopts'));
    }
    public function adoptAccept($id)
    {
        $adopt = Adopt::find($id)->update([
            'is_accepted' => 1
        ]);

        if($adopt) {
            $response = [
                'status' => 1
            ];
        } else {
            $response = [
                'status' => 0
            ];
        }
        return $response;
    }

    public function adoptDecline($id)
    {
        $adopt = Adopt::find($id)->update([
            'is_accepted' => 2
        ]);

        if($adopt) {
            $response = [
                'status' => 1
            ];
        } else {
            $response = [
                'status' => 0
            ];
        }
        return $response;
    }
}
