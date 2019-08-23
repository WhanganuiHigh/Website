@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@if($page->image)
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;">
@endif


@yield('postContent')



@foreach( collect([
$page->getDepartmentHofs($faculties, $staff, "International"),
$page->getDepartmentAHofs($faculties, $staff, "International"),
$page->getDepartmentStaff($faculties, $staff, "International"),
])->collapse() as $person)
<article class="py-3">
    <h3 class="decorated py-3 mb-4">
        {{$person->title}}
        <span class="text-muted">
            @foreach($page->getStaffMemberPositionsForDepartment($person, "International") as $position)
            {{ $position["title"] }}
            @if(!$loop->last), @endif
            @endforeach
        </span>
    </h3>
    <div class="row">
        <div class="col-sm-12 col-md-4 col-md-4">
            @if($person->image)
            <img src="{{$person->image }}" width="255" />
            @endif
        </div>
        <div class="col-sm-12 col-md-8 col-md-8">
            {!! $person !!}
            @if(!empty($person->email))
            <a href="mailto:{{$person->email}}" class="button button--green">
                {{$person->email}}
            </a>
            @endif
        </div>
    </div>
</article>
@endforeach



@include('_partials.lastReviewed')

@endsection