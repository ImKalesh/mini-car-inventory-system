<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    public function create(Request $req)
    {
        try {
            $this->validatorGate($req);
            $save= Models::create([
                 'manufacturer_id' => $req->mId
                 ,'name' => $req->modelName
             ]);
     
             return $save 
                         ?response()->json(['message' => 'ok'],200)
                         :response()->json(['message' => 'failed'],501);
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
                'mId' => 'required|integer',
                'modelName' =>'required'

        ];
    }
    protected function VMessages()
    {
        return [
            'mId.rquired' => 'Manufacturer name is required',
            'modelName.rquired' => 'Model name is required'
        ];
    }
}
