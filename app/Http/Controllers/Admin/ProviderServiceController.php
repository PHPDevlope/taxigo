<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProviderService;
use Illuminate\Http\Request;

class ProviderServiceController extends Controller
{
    public function index()
    {
        return view('admin.provider-service.index');
    }

    public function create()
    {
        return view('taxigo.admin.provider-service.create');
    }

    public function show(ProviderService $providerService)
    {
        return view('taxigo.admin.provider-service.show', compact('providerService'));
    }

    public function edit(ProviderService $providerService)
    {
        return view('taxigo.admin.provider-service.edit', compact('providerService'));
    }
}
