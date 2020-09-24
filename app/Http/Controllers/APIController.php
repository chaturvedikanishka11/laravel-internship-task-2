<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;

class APIController extends Controller
{
    public function allData(Request $req)
    {
         $user=blog::where('Status','=',1)->get();
         // dd($user);
        
        if($user->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'user' => $user
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data Not Found'
            ]);
        }
    }




     public function show( Request $req){ 

        $user =blog::where('blogid','=',$req->id)->first();

        if($user){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'user' => $user
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data Not Found'
            ]);
        }

                                                                                                                                        
    
     }
}
