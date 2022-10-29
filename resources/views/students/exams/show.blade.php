@extends('layouts.app')

@section('title', $exam->title)

@section('content')

<form action="{{route('students.exams.submit', $exam)}}" method="post">
    @csrf()
@include('layouts.question_types.four_choice_question')
@include('layouts.question_types.fill_place_holder_question')
<input type="submit" class="btn btn-primary"></button>
</form>
@endsection('content')