@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

    @include('layouts.question_types.four_choice_question')
    @include('layouts.question_types.fill_place_holder_question')

@endsection('content')