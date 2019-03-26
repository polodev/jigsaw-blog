@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')

    <h1 class="leading-none mb-2">{{ $page->title }}</h1>

    <p class="text-grey-darker text-xl md:mt-0">{{ $page->author }}  •  {{ date('F j, Y', $page->date) }}</p>

    <div>
    @if ($page->series_tags)
        <span>Tags: </span>
        @foreach ($page->series_tags as $i => $tag)
            <a
                href="{{ '/series/tags/' . $tag }}"
                title="View posts in {{ $tag }}"
                class="inline-block bg-grey-light hover:bg-blue-lighter leading-loose tracking-wide text-grey-darkest uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
            >{{ $tag }}</a>
        @endforeach
    @endif
    </div>
    <div>
    @if ($page->series_names)
        <span>Series: </span>
        @foreach ($page->series_names as $i => $series_name)
            <a
                href="{{ '/series/' . $series_name }}"
                title="View posts in {{ $series_name }}"
                class="inline-block bg-grey-light hover:bg-blue-lighter leading-loose tracking-wide text-grey-darkest uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
            >{{ $series_name }}</a>
        @endforeach
    @endif
    </div>

    <div>
    @if ($page->series_names)
    <?php 
    $series_post = $series->filter(function ($value, $key) use($page) {
        $first_series_name = array_shift($value->series_names);
        return in_array($first_series_name, $page->series_names);
    });
    $series_post = $series_post->sortBy('order');
     ?>
        <h2>All post under this series</h2>
        <ul>
            @foreach ($series_post as $post)
                <li>
                    <a href="{{ $post->getUrl() }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif
    </div>

    <div class="border-b border-blue-lighter mb-10 pb-4" v-pre>
        @yield('content')
    </div>

    <nav class="flex justify-between text-sm md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}">
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}">
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>
@endsection
