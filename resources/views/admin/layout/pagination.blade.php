@if ($paginator->hasPages())
{{--{{dd($paginator->currentPage())}}--}}
    <nav aria-label="">

        <ul class="pagination">

            @if($paginator->lastPage() > 10)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Обрати сторінку
                </a>
                <ul class="dropdown-menu">
                    @for($i=1; $i<= $paginator->lastPage(); $i++)
                        <a class="m-1" href="{{$paginator->url($i) }}">{{ $i }}</a>
                    @endfor
                </ul>
            </li>
            @endif

            <li class="page-item">
            @if ($paginator->onFirstPage())
{{--                <span class="page-link" href="#" aria-label="Previous">--}}
{{--                    <span aria-hidden="true">&laquo;</span>--}}
{{--                    <span class="sr-only">Previous</span>--}}
{{--                </span>--}}
            @else
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            @endif
            </li>

            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <li class="page-item">
                @if ($paginator->hasMorePages())
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                @else
{{--                    <span class="page-link" href="" aria-label="Next">--}}
{{--                        <span aria-hidden="true">&raquo;</span>--}}
{{--                        <span class="sr-only">Next</span>--}}
{{--                    </span>--}}
                @endif
            </li>
        </ul>
        <p class="text-sm text-gray-700">
            {!! __('Showing') !!}
            @if ($paginator->firstItem())
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
            @else
                {{ $paginator->count() }}
            @endif
            {!! __('of') !!}
            <span class="font-medium">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </p>
    </nav>
@endif
