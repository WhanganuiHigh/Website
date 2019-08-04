@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')


<h2 class="decorated d-table">Board Members</h2>
<div class="row no-gutters">
        @foreach($board_members->where('category',"Board Member")->sortBy(function($st){
            return array_reverse(explode(" ", $st->title));
        })
        ->sortBy(function($st){
            return $st->position ?: "ZZZZZZZZZZZZZZZZZZZZZZ";
        }) as $member)
        <div class="col-12 col-md-4 p-5">
            <h3>{{$member->title}} <br><small>{{$member->position}}</small></h3>
          @if($member->image)  
        <img src="{{$member->image}}" alt="">
        @endif
        </div>
        <div class="col-12 col-md-8 p-5">
            {!! $member !!}
        </div>
        @endforeach
</div>


<?php
$coopted = $board_members->where('category',"Co-opted Member")->sortBy(function($st){
                    return array_reverse(explode(" ", $st->title));
                })
                ->sortBy(function($st){
                    return $st->position ?: "ZZZZZZZZZZZZZZZZZZZZZZ";
                });
?>
@if(count($coopted))
<h2 class="decorated d-table">Co-opted Members</h2>
<div class="row no-gutters">
    @foreach($coopted as $member)
    <div class="col-12 col-md-4 p-5">
            <h3>{{$member->title}} <br><small>{{$member->position}}</small></h3>
    
            <img src="{{$member->image}}" alt="">
        </div>
        <div class="col-12 col-md-8 p-5">
            {!! $member !!}
        </div>
    @endforeach
</div>
@endif


<h2 class="decorated d-table">Also in Attendance</h2>
<div class="row no-gutters">
    @foreach($board_members->where('category',"Also in Attendance")->sortBy(function($st){
        return array_reverse(explode(" ", $st->title));
    })
    ->sortBy(function($st){
        return $st->position ?: "ZZZZZZZZZZZZZZZZZZZZZZ";
    }) as $member)
    <div class="col-12 col-md-4 p-5">
            <h3>{{$member->title}} <br><small>{{$member->position}}</small></h3>
    
            <img src="{{$member->image}}" alt="">
        </div>
        <div class="col-12 col-md-8 p-5">
            {!! $member !!}
        </div>
    @endforeach
</div>

@include('_partials.lastReviewed')



@endsection