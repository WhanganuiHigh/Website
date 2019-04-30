@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')


<h2 class="decorated d-table mt-5 mb-2">Current Vacancies</h2>
@forelse($vacancies as $k=>$vacancy)
<div class="row">
    <div class="col-sm-12 col-md-6">
        <h3>{{$k}}{{$vacancy->title}}</h3>
        <p>Applications close: {{ date('F j, Y', $vacancy->date) }}</p>

    </div>
    <div class="col-sm-12 col-md-6">
        <a href="mailto:{{$vacancy->email ?: " principal@whs.ac.nz "}}?subject=Application:{{$vacancy->title}}" class="btn btn-outline-dark mb-5">Apply for this position.</a>
    </div>
    <div class="col-12">
        {!! $vacancy !!}
    </div>
</div>

<hr >

@empty
<strong>SORRY, BUT THERE ARE CURRENTLY NO VACANCIES.</strong>
<hr> @endforelse

<p>
    <strong>Last Reviewed: {{ date('F j, Y', $page->date) }}</strong><br> @foreach ($page->tags as $tag)
    <a href="/tags/{{ $tag }}">{{ $tag }}</a> {{ $loop->last ? '' : '-' }} @endforeach
</p>


<blockquote data-phpdate="{{ $page->date }}">
    <em>WARNING: This post is over a year old. Some of the information this contains may be outdated.</em>
</blockquote>


@if ($page->comments)
    @include('_partials.comments') @else
<p>Comments are not enabled for this post.</p>
@endif
@endsection