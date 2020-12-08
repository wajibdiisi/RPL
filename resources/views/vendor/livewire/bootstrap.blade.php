<div>
    @if ($paginator->hasPages())
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" style="background-color: rgba(0,0,0,0) !important; border :none !important" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" style="background-color: rgba(0,0,0,0) !important; border :none !important" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item" style="background-color: rgba(0,0,0,0) !important; border :none !important">
                        <button type="button" style="background-color: rgba(0,0,0,0) !important; border :none !important" dusk="previousPage" class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</button>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" style="background-color: rgba(0,0,0,0) !important; border :none !important" aria-disabled="true"><span class="page-link" style="background-color: rgba(0,0,0,0) !important; border :none !important" >{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" style="background-color: rgba(0,0,0,0) !important; border :none !important" wire:key="paginator-page-{{ $page }}" aria-current="page"><span style="background-color: rgba(0,0,0,0) !important; border :none !important" 
                                    class="page-link">{{ $page }}</span></li>
                            @else
                                <li  class="page-item" style="background-color: rgba(0,0,0,0) !important; border :none !important" wire:key="paginator-page-{{ $page }}"><button type="button" class="page-link"  style="background-color: rgba(0,0,0,0) !important; border :none !important"wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item" >
                        <button type="button" dusk="nextPage" class="page-link" style="background-color: rgba(0,0,0,0) !important; border :none !important" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</button>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')" >
                        <span class="page-link " style="background-color: rgba(0,0,0,0) !important; border :none !important" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
