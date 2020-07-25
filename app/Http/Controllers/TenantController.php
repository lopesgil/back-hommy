<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use App\Ad;

class TenantController extends Controller
{
    public function createTenant(Request $request) {
        $tenant = new Tenant;
        $tenant->name = $request->name;
        $tenant->cpf = $request->cpf;
        $tenant->phone = $request->phone;
        $tenant->email = $request->email;
        $tenant->save();
        return response()->json($tenant);
    }

    public function showTenant($id) {
        $tenant = Tenant::findOrFail($id);
        return response()->json($tenant);
    }

    public function listTenants() {
        $tenants = Tenant::all();
        return response()->json([$tenants]);
    }

    public function updateTenant(Request $request, $id) {
        $tenant = Tenant::findOrFail($id);
        if($request->name){
            $tenant->name = $request->name;
        }
        if($request->cpf){
            $tenant->cpf = $request->cpf;
        }
        if($request->phone){
            $tenant->phone = $request->phone;
        }
        if($request->email){
            $tenant->email = $request->email;
        }
        $tenant->save();
        return response()->json($tenant);
    }
    
    public function deleteTenant($id) {
        Tenant::destroy($id);
        return response()->json(['Locatário deletado']);
    }

    public function chooseAd($id, $ad_id) {
        $tenant = Tenant::findOrFail($id);
        $ad = Ad::findOrFail($ad_id);
        $tenant->ad_id = $ad_id;
        $tenant->save();
        return response()->json($tenant);
    }

    public function unchooseAd($id){
        $tenant = Tenant::findOrFail($id);
        $tenant->ad_id = NULL;
        $tenant->save();
        return response()->json($tenant);
    }

    public function showChoosedAd($id) {
        $tenant = Tenant::findOrFail($id);
        return response()->json($tenant->ad);
    }

    public function saveAd($id, $ad_id) {
        $tenant = Tenant::findOrFail($id);
        $ad = Ad::findOrFail($ad_id);
        $tenant->savedAds()->attach($ad_id);
        return response()->json($tenant->savedAds);
    }

    public function unsaveAd($id, $ad_id) {
        $tenant = Tenant::findOrFail($id);
        //$ad = Ad::findOrFail($ad_id);
        $tenant->savedAds()->detach($ad_id);
        return response()->json($tenant->savedAds);
    }

    public function showSavedAds($id) {
        $tenant = Tenant::findOrFail($id);
        return response()->json($tenant->savedAds);
    }
}
