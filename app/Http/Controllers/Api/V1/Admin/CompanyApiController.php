<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\Admin\CompanyResource;
use App\Models\Company;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyResource(Company::with(['user'])->get());
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());

        if ($request->input('company_logo', false)) {
            $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('company_logo'))))->toMediaCollection('company_logo');
        }

        foreach ($request->input('company_docs', []) as $file) {
            $company->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('company_docs');
        }

        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Company $company)
    {
        abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyResource($company->load(['user']));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        if ($request->input('company_logo', false)) {
            if (!$company->company_logo || $request->input('company_logo') !== $company->company_logo->file_name) {
                if ($company->company_logo) {
                    $company->company_logo->delete();
                }
                $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('company_logo'))))->toMediaCollection('company_logo');
            }
        } elseif ($company->company_logo) {
            $company->company_logo->delete();
        }

        if (count($company->company_docs) > 0) {
            foreach ($company->company_docs as $media) {
                if (!in_array($media->file_name, $request->input('company_docs', []))) {
                    $media->delete();
                }
            }
        }
        $media = $company->company_docs->pluck('file_name')->toArray();
        foreach ($request->input('company_docs', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $company->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('company_docs');
            }
        }

        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Company $company)
    {
        abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
