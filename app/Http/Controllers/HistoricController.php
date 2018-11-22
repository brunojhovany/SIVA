<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\userlevels;
use App\registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HistoricController extends Controller
{
    public function HistoricView() {
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        $historic = registro::orderBy('f')->get();
        if (Auth::user()->profile  == 1){
            return view('configuracion.select_historic_range',[
                'level' => $lv,
                'historics' => $historic
            ]);
        }
        else 
        abort(403,'Forbidden: Acceso denegado para su tipo de usario');

    }

    public function HistoricQuery(Request $request) {
        $R = new registro;
        $week = $R->GetReportByWeek($request->yearwithweek);
        return response()->json([
            'html' => view('configuracion.view_list_historic',compact('week'))->render(),
        ]);
    }
}
