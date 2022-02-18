<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppSettingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('app_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.app-setting.index');
    }

    public function create()
    {
        abort_if(Gate::denies('app_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.app-setting.create');
    }

    public function edit(AppSetting $appSetting)
    {
        abort_if(Gate::denies('app_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.app-setting.edit', compact('appSetting'));
    }

    public function show(AppSetting $appSetting)
    {
        abort_if(Gate::denies('app_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.app-setting.show', compact('appSetting'));
    }
}
