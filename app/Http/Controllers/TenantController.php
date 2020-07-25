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

    public function listTenant() {
        $tenant = Tenant::all();
        return response()->json([$tenant]);
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
        return respone()->json(['Locatário deletado']);
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
}
