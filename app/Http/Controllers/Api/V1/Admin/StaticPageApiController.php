<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaticPageRequest;
use App\Http\Requests\UpdateStaticPageRequest;
use App\Http\Resources\Admin\StaticPageResource;
use App\Models\StaticPage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaticPageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('static_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StaticPageResource(StaticPage::all());
    }

    public function store(StoreStaticPageRequest $request)
    {
        $staticPage = StaticPage::create($request->validated());

        return (new StaticPageResource($staticPage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StaticPage $staticPage)
    {
        abort_if(Gate::denies('static_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StaticPageResource($staticPage);
    }

    public function update(UpdateStaticPageRequest $request, StaticPage $staticPage)
    {
        $staticPage->update($request->validated());

        return (new StaticPageResource($staticPage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StaticPage $staticPage)
    {
        abort_if(Gate::denies('static_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staticPage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
