@extends('admin.layouts.main')

@section('title', 'Admin | Exams questions')


@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h1 class="m-0 font-weight-bold text-primary">Create New Question for Exam: {{$exam->title}}</h1>
        <a class="btn btn-warning m-0 font-weight-bold text-primary d-flex align-items-center" href="{{route('admin.exams.show', $exam)}}">
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
            <div class="form-group">
                <select class="form-select form-select-sm py-2 px-3">
                    <option disabled selected>Question Types</option>
                    @foreach ($question_types as )
                        
                    @endforeach
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                @error('body')
                <small class="form-text font-weight-bold text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection