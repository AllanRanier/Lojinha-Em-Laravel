@if ($paginator->lastPage() > 1)
    <ul class="pagination pagination-sm m-0 float-right">
        <li>
            <a href="{{ $paginator->url(1) }}" class="page {{ $paginator->currentPage() == 1 ? 'disabled' : '' }}"
                title="Anterior" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ $paginator->currentPage() == $i ? 'active' : '' }}">
                <a href="{{ $paginator->url($i) }}" class="page" data-i="{{ $i }}"
                    data-page="{{ $i }}">{{ $i }}</a>
            </li>
        @endfor
        <li>
            <a href="{{ $paginator->url($paginator->currentPage() + 1) }}"
                class="page {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}"
                title="Próximo" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></a>
        </li>
    </ul>
@endif
