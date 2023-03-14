@if($paginator->total() > $paginator->perPage())
<ul class="pagination">
    @if(!$paginator->onFirstPage())
    <li class="page-item hide-on-sp"><a href="{{ $paginator->url(1) }}">&laquo;</a></li>
    @endif

    @if(request()->has('page'))
    @if(request()->page > 1)
    <li class="page-item"><a href=" {{ $paginator->previousPageUrl() }}" rel="prev">{{request()->page - 1}}</a></li>
    @endif
    <li class="page-item"><a class="active">{{ $paginator->currentPage()}}</a></li>
    @if ($paginator->hasMorePages())
    <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next">{{request()->page + 1}}</a></li>
    @endif
    @else
    <li class="page-item"><a class="active">{{ $paginator->currentPage()}}</a></li>
    @if ($paginator->hasMorePages())
    <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next">2</a></li>
    @endif
    @endif

    @if ($paginator->hasMorePages())
    <li class="page-item hide-on-sp"><a href="{{ $paginator->url($paginator->lastPage()) }}">&raquo;</a></li>
    @endif
</ul>
@endif