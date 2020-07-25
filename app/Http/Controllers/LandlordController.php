<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landlord;

class LandlordController extends Controller
{
    public function createLandlord(Request $request) {
        $landlord = new Landlord;
        $landlord->name = $request->name;
        $landlord->cpf = $request->cpf;
        $landlord->phone = $request->phone;
        $landlord->address = $request->address;
        $landlord->email = $request->email;
        $landlord->save();
        return response()->json($landlord);
    }

    public function showLandlord($id) {
        $landlord = Landlord::findOrFail($id);
        return response()->json($landlord);
    }

    public function listLandlords() {
        $landlords = Landlord::all();
        return response()->json([$landlords]);
    }

    public function updateLandlord(Request $request, $id) {
        $landlord = Landlord::findOrFail($id);
        
        if($request->name){
            $landlord->name = $request->name;
        }
        if($request->cpf){
            $landlord->cpf = $request->cpf;
        }
        if($request->phone){
            $landlord->phone = $request->phone;
        }
        if($request->address){
            $landlord->address = $request->address;
        }
        if($request->email){
            $landlord->email = $request->email;
        }

        $landlord->save();
        return response()->json($landlord);
    }
    
    public function deleteLandlord($id) {
        Landlord::destroy($id);
        return response()->json(['Locador deletado']);
    }

    public function showPostedAds($id) {
        $landlord = Landlord::findOrFail($id);
        return response()->json([$landlord->ads]);
    }
}


