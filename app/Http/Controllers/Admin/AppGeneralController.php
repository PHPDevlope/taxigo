<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MSetting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppGeneralController extends Controller
{
    public function index($id)
    {
        $mSetting = MSetting::find($id);


        return view('taxigo.app-Settings', compact('mSetting'));
    }
}
