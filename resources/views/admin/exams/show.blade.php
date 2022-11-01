@extends('admin.layouts.main')

@section('title', 'Admin | Exam {{$exam->getKey()}}')


@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h1 class="m-0 font-weight-bold text-primary">Exam: {{$exam->title}}</h1>
        <a class="btn btn-success m-0 font-weight-bold text-primary d-flex align-items-center text-dark" 
        href="{{route('admin.exams.questions.create', $exam)}}">+ Add Question</a>
    </div>

    
    </div>
</div>
@endsection