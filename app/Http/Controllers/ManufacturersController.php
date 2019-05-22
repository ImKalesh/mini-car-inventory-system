<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturersController extends Controller
{

    public function index()
    {
        $manufacturers=Manufacturer::get();
        return response()->json([
            'data' => $manufacturers
        ],200);
    }

    public function create(Request $request)
    {
        try {
            $this->validatorGate($request);
            $save=Manufacturer::create(['name' =>$request->manufacturerName]);
            return $save 
                    ?  response()->json(['message' => 'ok'],200) 
                    : response()->json(['message' => 'failed'],501);
            
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()],501);
        }
        
    }

    public function validatorGate($req)
    {
            $v= \Validator::make($req->all(),$this->VErrors(),$this->VMessages());
            if($v->fails()) throw new \Exception($v->errors(), 1);
    }

    protected function VErrors()
    {
        return [
                'manufacturerName' => 'required'
        ];
    }
    protected function VMessages()
    {
        return [
            'manufacturerName.rquired' => 'Manufacturer name is required'
        ];
    }
}
