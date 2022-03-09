<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaticPageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('static_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.static-page.index');
    }

    public function create()
    {
        abort_if(Gate::denies('static_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.static-page.create');
    }

    public function edit(StaticPage $staticPage)
    {
        abort_if(Gate::denies('static_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.static-page.edit', compact('staticPage'));
    }

    public function show(StaticPage $staticPage)
    {
        abort_if(Gate::denies('static_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.static-page.show', compact('staticPage'));
    }
}
