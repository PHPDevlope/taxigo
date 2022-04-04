<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProviderDocument;
use Illuminate\Http\Request;

class ProviderDocumentController extends Controller
{
    public function index()
    {
        return view('admin.provider-document.index');
    }

    public function create()
    {
        return view('taxigo.admin.provider-document.create');
    }

    public function show(ProviderDocument $providerDocument)
    {
        return view('taxigo.admin.provider-document.show', compact('providerDocument'));
    }

    public function edit(ProviderDocument $providerDocument)
    {
        return view('taxigo.admin.provider-document.edit', compact('providerDocument'));
    }
}
