@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}}
@if($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; max-width:100%"> @endif @yield('postContent')



<div class="row">

    <div class="col-12 col-lg-6">

        Courses in the {{ $page->title }} Subject Area:

        <ul class="list-group my-4">
            @foreach($courses->where('subject_area', $page->title) as $c)
            <li class="list-group-item list-group-item-action">
                <a href="{{$c->getPath()}}">{{ $c->name }} ({{$c->course_level}})</a>
            </li>
            @endforeach
        </ul>

    </div>
    <div class="col-12 col-lg-6">

        Other Subject Areas in the {{ $page->faculty }} faculty:

        <ul class="list-group my-4">
            @foreach($subject_areas->where('faculty', $page->faculty) as $other)
            <li class="list-group-item list-group-item-action">
                <a href="{{$other->getPath()}}">{{ $other->title }}</a>
            </li>
            @endforeach
        </ul>

    </div>
</div>


@include('_partials.lastReviewed')

@endsection