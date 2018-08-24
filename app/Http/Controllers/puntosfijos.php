<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class puntosfijos extends Controller
{
    public function solounaves(){
        return response()->json([
            'html' => view('puntosfijos.onlyone',compact(''))->render()
        ]);
    }
}
