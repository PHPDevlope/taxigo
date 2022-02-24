<div>
    @if($paginator->hasPages())
        <div class="d-flex align-items-center">
            <div class="text-sm">
                Showing <strong>{{ $paginator->firstItem() }}</strong> to <strong>{{ $paginator->lastItem() }}</strong> of <strong>{{ $paginator->total() }}</strong> results
            </div>
            <nav class="ms-auto" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        @if($paginator->onFirstPage())
                            <span class="page-link">
                            {!! __('pagination.previous') !!}
                        </span>
                        @else
                            <button class="page-link" wire:click="previousPage" dusk="previousPage.before"  wire:loading.attr="disabled" >
                                <i class="bi bi-chevron-left"></i>
                            </button>
                        @endif
                    </li>
                    {{-- Pagination Elements --}}
                    @foreach($elements as $element)
                        @if(is_array($element))
                            @foreach($element as $page => $url)
                                <li class="page-item" wire:key="paginator-page{{ $page }}">
                                    @if($page == $paginator->currentPage())
                                        <span aria-current="page">
                                            <span class="page-link">{{ $page }}</span>
                                        </span>
                                    @else
                                        <button wire:click="gotoPage({{ $page }})" class="page-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                            {{ $page }}
                                        </button>
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    @endforeach
                    <li class="page-item">
                        @if($paginator->hasMorePages())
                            <button class="page-link"  wire:click="nextPage" wire:loading.attr="disabled"  dusk="nextPage.before" >
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        @else
                            <span class="page-link">
                                {!! __('pagination.next') !!}
                            </span>
                        @endif
                    </li>
                </ul>
            </nav>
        </div>
    @endif
</div>
