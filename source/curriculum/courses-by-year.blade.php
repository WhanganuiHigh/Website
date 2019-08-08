@extends('_layouts.standard')

@section('title', "Courses by Year")

@section('content')
<h1 class="decorated py-3 mb-4">Courses By Level</h1>

@php
$levels = [
"9" => "Year 9",
"10" => "Year 10",
"11" => "Level 1",
"12" => "Level 2",
"13" => "Level 3"
];
@endphp

@foreach($levels as $level=>$levelTitle)
<details class="mb-5">
    <summary>
        <h2 class="decorated d-table my-5">{{ $levelTitle }}
    </summary>
    @php
    $mapped = $faculties->map(function($faculty) use ($level, $subject_areas, $courses){
        $subjectAreas = $subject_areas
            ->where('faculty', $faculty->title)
            ->sortBy('title')
            ->map(function($subject) use ($level, $courses){
                $subjectCourses = $courses->filter(function($course) use ($level, $subject){
                    return $course->year == $level && $course->subject_area == $subject->title;
                });
            return ['subjectArea' => $subject, 'courses' => $subjectCourses];
        })
        ->filter(function($sa){
            return $sa['courses']->isNotEmpty();
        });

        return ['faculty'=>$faculty, 'subjectAreas'=>$subjectAreas];
    })->filter( function($f){
        return $f['subjectAreas']->isNotEmpty();
    });
    @endphp

<div class="row">
    @foreach($mapped as $faculty)
    <div class="col-6 mb-5">
        <h3 class="d-table">{{ $faculty['faculty']->title}}</h3>
        <ul>
        @foreach($faculty['subjectAreas'] as $subjectArea)
                @foreach($subjectArea['courses'] as $course)
                <li>
                    <a href="{{$course->getPath()}}">{{$course->course_level}} - {{ $course->name }}</a>
                </li>
                @endforeach
        @endforeach
        </ul>
    </div>
    @endforeach
</div>

</details>
@endforeach



@endsection