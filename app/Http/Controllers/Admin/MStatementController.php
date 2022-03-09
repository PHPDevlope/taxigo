<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MStatement;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MStatementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('m_statement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.m-statement.index');
    }

    public function create()
    {
        abort_if(Gate::denies('m_statement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.m-statement.create');
    }

    public function edit(MStatement $mStatement)
    {
        abort_if(Gate::denies('m_statement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.m-statement.edit', compact('mStatement'));
    }

    public function show(MStatement $mStatement)
    {
        abort_if(Gate::denies('m_statement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mStatement->load('user', 'document');

        return view('taxigo.admin.m-statement.show', compact('mStatement'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['m_statement_create', 'm_statement_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new MStatement();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
