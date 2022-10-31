@extends('admin.layouts.main')

@section('title', 'Admin | Exams questions')


@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h1 class="m-0 font-weight-bold text-primary">Create New Question for Exam: {{$exam->title}}</h1>
        <a class="btn btn-warning m-0 font-weight-bold text-primary d-flex align-items-center" 
        href="{{route('admin.exams.questions.show', $exam)}}">
        Back
    </a>
    </div>
    <div class="card-body">
        <form action="{{route('admin.exams.questions.store', $exam)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Question Body</label>
                <textarea class="form-control" id="body" name='body' rows="3"></textarea>
                @error('body')
                <small class="form-text font-weight-bold text-danger">{{ $message }}</small>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
</div>
@endsection