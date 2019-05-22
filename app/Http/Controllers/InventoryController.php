<?php

namespace App\Http\Controllers;

use App\Models as CarModels;
use App\Manufacturer;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $data=CarModels::with('manufacturer')   
                        ->groupBy('name')
                        ->groupBy('manufacturer_id')
                        ->where('sold','parked')
                        ->select('*',\DB::raw("COUNT(*) count"))
                        ->get();
        return response()->json($data);
    }

    public function sold(Request $req)
    {
        try {
            $delete=CarModels::where('manufacturer_id',$req->mId)->whereName($req->model)->whereId($req->s_no)->take(1)->update(['sold' => 'sold']);
            return  response()->json( ['message' => $delete ? 'ok' : 'failed'],$delete ? 200 : 501);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()],501);
        }
    }

    
}
