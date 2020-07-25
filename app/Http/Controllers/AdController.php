<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Landlord;

class AdController extends Controller
{
    public function createAd(Request $request) {
        $landlord = Landlord::findOrFail($request->landlord_id);

        $ad = new Ad;
        $ad->address = $request->address;
        $ad->district = $request->district;
        $ad->city = $request->city;
        $ad->rooms = $request->rooms;
        $ad->beds = $request->beds;
        $ad->vacancies = $request->vacancies;
        $ad->price = $request->price;
        $ad->landlord_id = $request->landlord_id;
        $ad->save();

        return response()->json($ad);
    }

    public function showAd($id) {
        $ad = Ad::findOrFail($id);
        return response()->json($ad);
    }

    public function listAds() {
        $ads = Ad::all();
        return response()->json([$ads]);
    }

    public function updateAd(Request $request, $id) {
        $ad = Ad::findOrFail($id);

        if($request->address){
            $ad->address = $request->address;
        }
        if($request->district){
            $ad->district = $request->district;
        }
        if($request->city){
            $ad->city = $request->city;
        }
        if($request->rooms){
            $ad->rooms = $request->rooms;
        }
        if($request->beds){
            $ad->beds = $request->beds;
        }
        if($request->vacancies){
            $ad->vacancies = $request->vacancies;
        }
        if($request->price){
            $ad->price = $request->price;
        }

        $ad->save();
        return response()->json($ad);
    }
    
    public function deleteAd($id) {
        Ad::destroy($id);
        return response()->json(['Anúncio deletado']);
    }

    public function showAdLandlord($id) {
        $ad = Ad::findOrFail($id);
        return response()->json($ad->landlord);
    }

    public function showAdTenants($id) {
        $ad = Ad::findOrFail($id);
        return response()->json([$ad->tenants]);
    }

    public function showSavedTenants($id) {
        $ad = Ad::findOrFail($id);
        return response()->json($ad->savedTenants);
    }
}
