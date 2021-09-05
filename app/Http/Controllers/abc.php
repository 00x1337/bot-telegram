<?php

namespace App\Http\Controllers;

use App\Models\all;
use Illuminate\Http\Request;

class abc extends Controller
{
    public function a($id){
        $all = all::where('id','=',$id)->first();
        if ($all == null){
            dd("Error");

        }
$id1= $id;
        return view('edit',compact('all','id1'));
    }
    public function edit(Request $request)
    {
        $id = explode('/',url()->previous())[4];
        $requestt =$request->request->all();
        $all = all::where('id','=',$id)->first();
        $all->words = $requestt["word"];
        $all->reply = implode('{}',$requestt["reply"]);
        $all->update();
        return redirect()->back();
    }

    }
