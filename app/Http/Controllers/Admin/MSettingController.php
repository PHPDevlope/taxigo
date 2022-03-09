<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MSetting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MSettingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('m_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.m-setting.index');
    }

    public function create()
    {
        abort_if(Gate::denies('m_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.m-setting.create');
    }

    public function edit(MSetting $mSetting)
    {
        abort_if(Gate::denies('m_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.m-setting.edit', compact('mSetting'));
    }

    public function show(MSetting $mSetting)
    {
        abort_if(Gate::denies('m_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.m-setting.show', compact('mSetting'));
    }
}
