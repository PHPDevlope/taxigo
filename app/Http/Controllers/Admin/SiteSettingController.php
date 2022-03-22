<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\SiteSetting;

class SiteSettingController extends Controller
{
    public function index()
    {
        return view('admin.app-setting.index');
    }

    public function create()
    {
        return view('taxigo.admin.site-setting.create');
    }

    public function edit(SiteSetting $siteSetting)
    {
        return view('taxigo.admin.site-setting.edit', compact('siteSetting'));
    }

    public function show(SiteSetting $siteSetting)
    {
        return view('taxigo.admin.site-setting.show', compact('siteSetting'));
    }
}
