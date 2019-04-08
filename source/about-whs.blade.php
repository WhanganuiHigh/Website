@extends('_layouts.full') 
@section('title', 'Posts') 
@section('content')

<div class="houses bg-green text-center text-yellow row no-gutters">
               

    <div class="col p-5 bg-green text-white shadow-right-inset d-flex flex-column justify-content-around align-items-center">
        <h2 class="mb-5">
            {{$about->get('about-whs')["title"]}}
        </h2>
        {!! $about->get('about-whs') !!}
        <a class="btn btn-outline-light mt-5" href="{{ $about->get('about-whs')->getPath() }}">Read our full story</a>
    </div>
    <div class="col p-5 bg-white text-green d-flex flex-column justify-content-around align-items-center">
        <h2 class="mb-5">
                {{$about->get('principals-message')["title"]}}
        </h2>
        {!! $about->get('principals-message') !!}
        <a class="btn btn-outline-dark mt-5" href="{{ $about->get('principals-message')->getPath() }}">See what I have to say</a>
    </div>
</div>
    @include('_partials.banner.feature-image')

<div class=" bg-white text-green row no-gutters">
    <div class="col p-5 bg-yellow text-dark shadow-right-inset d-flex flex-column justify-content-around align-items-center">
            <h2 class="mb-5">
                    {{$about->get('facilities')["title"]}}
                </h2>
                {!! $about->get('facilities') !!}
                <a class="btn btn-outline-dark mt-5" href="{{ $about->get('facilities')->getPath() }}">More Information</a>
    </div>

    <div class="col p-5 bg-white text-dark shadow-right-inset d-flex flex-column justify-content-around align-items-center">
            <h2 class="mb-5">
                    {{$about->get('history')["title"]}}
                </h2>
                {!! $about->get('history') !!}
                <a class="btn btn-outline-dark mt-5" href="{{ $about->get('history')->getPath() }}">More Information</a>
    </div>
</div>



<div class="row no-gutters houses">
    <div class="col bg-white d-flex flex-column justify-content-center align-items-center">
        <div class="p-5 text-center text-green d-flex flex-column justify-content-center align-items-center">
            <h2 class="mb-5">Houses</h2>
            <p class="lead">Our communities play an important role in the school community</p>


            Main body about houses

            <!-- <a class="btn btn-outline-dark mt-5" href="">Our House Story</a> -->
        </div>
    </div>
    <div class="col text-center text-white d-flex flex-wrap">
        <div class="p-5 bg-awa d-flex justify-content-center align-items-center w-50">
            <h2 class="mb-0">Awa</h2>
        </div>
        <div class="p-5 bg-maunga d-flex justify-content-center align-items-center w-50">
            <h2 class="mb-0">Maunga</h2>
        </div>
        <div class="p-5 bg-moana d-flex justify-content-center align-items-center w-50">
            <h2 class="mb-0">Moana</h2>
        </div>
        <div class="p-5 bg-whenua d-flex justify-content-center align-items-center w-50">
            <h2 class="mb-0">Whenua</h2>
        </div>
    </div>
</div>



<div class="row no-gutters houses">
    @foreach($about->only(['board-of-trustees','houses']) as $section)
    <div class="col p-5 bg-green text-center text-yellow d-flex flex-column justify-content-between align-items-center">
        <h2 class="mb-0">
            {{ $section["title"]}}
        </h2>
            {!!$section!!}
        <a class="btn btn-outline-light mt-5" href="{{$section->getPath()}}">More information</a>
    </div>
    @endforeach
</div>

{{--
<h1>Posts</h1>

<ul>
    @forelse ($about->sortBy('title') as $post)
    <li>
        <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
        <small>{{ date('M j, Y', $post->date) }}</small>
    </li>
    @empty
    <p>No posts to show.</p>
    @endforelse
</ul> --}}
@endsection