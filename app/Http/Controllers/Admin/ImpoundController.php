<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Impound;
use App\Barangay;
use App\User;

class ImpoundController extends Controller
{
    public function impoudRequest()
    {
        $impounds = Impound::all();

        return view('dashboard.admin.impound.request', compact('impounds'));
    }

    public function impoundAccept($id)
    {
        $impound = Impound::find($id)->update([
            'is_accepted' => 1
        ]);

        if($impound) {
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

    public function impoundDecline($id)
    {
        $impound = Impound::find($id)->update([
            'is_accepted' => 2
        ]);

        if($impound) {
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

    public function list(Request $request)
    {
    //     $barangays = Barangay::where('city_id', 72217)->get();

    //     $users = User::where('barangay_id', $request->input('barangay_id'))->get();
        
    //     $impounds = [];

    //     foreach ($users as $key => $user) {
    //         foreach ($user->pet as $key => $pet) {
    //             if($pet->pet_category_id == $request->input('category')){
    //                 if(isset($pet->impound)){
    //                     $impounds[] = $pet->impound;
    //                 }
    //             } else{
    //                 if(isset($pet->impound)){
    //                     $impounds[] = $pet->impound;
    //                 }
    //             }
    //         }
    //     }
    //     // Convert array to object data
    //     $impounds = (object) $impounds;

    //     return view('dashboard.admin.impound.list', compact('impounds', 'barangays'));
    // }

    $impounds = Impound::all();
    return view('dashboard.admin.impound.list',compact('impounds'));
}
}
