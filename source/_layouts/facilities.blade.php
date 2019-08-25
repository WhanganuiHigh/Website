@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}}
@if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
        <img src="{{ $page->image }}"  style="object-fit: cover; max-width:100%; display: block;">
    </a>
@endif


 @yield('postContent')




@foreach($facilities as $facility)
<details>
<summary>
    <h2 class="decorated d-table mt-5 mb-3">{{$facility->title}}</h2> 
</summary>

@if ($facility->image)
    <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_500,h_300/", $facility->image)}}"
        srcset="
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_950,h_300/", $facility->image)}} 950w,
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_500,h_300/", $facility->image)}} 500w
        "
        sizes="(min-width: 800px) 950px, 500px"
        alt="" style="max-width: 100%">
@endif


{!! $facility !!}

@if(is_array($facility->image_gallery))
    <div class="image-gallery">
        @foreach($facility->image_gallery as $image)
        <a href="{{$image["image"]}}" class="featured">
            <img src="{{ str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_scale,q_80,w_300/",$image["image"])}}" @isset($image["description"])alt="{{$image["description"]}}" title="{{$image["description"]}}"@endisset>
        </a>
        @endforeach
    </div>
    @endif
</details>
@endforeach

@include('_partials.lastReviewed')


@endsection
