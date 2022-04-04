<div>
    <div wire:loading.delay>
        Loading...
    </div>
    <div class="row bg-white">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover table-spaced">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            Document
                        </th>
                        <th scope="col">
                            Status
                        </th>
                        <th scope="col">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($providerDocuments as $providerDocument)
                        <tr>
                            <td>
                                {{ $providerDocument->id }}
                            </td>
                            <td>
                                @if($providerDocument->documentName)
                                    <span class="badge badge-lg badge-dot">
                                        <i class="bg-success"></i>
                                        {{ $providerDocument->documentName->document_name }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                {{ $providerDocument->status }}
                            </td>
                            <td class="text-end">
                                <div class="flex justify-end">
                                    @can('user_show')
                                        <a class="btn btn-sm btn-neutral" href="{{ route('admin.provider-documents.show', $providerDocument) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
