@extends('admin.layouts.main')

@section('title', 'Admin | Exams questions')


@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <div class="col-11">
            <h1 class="m-0 font-weight-bold text-primary">Create New Answer for Question: {{$question->body}}</h1>

        </div>
        <div class="col-1 d-flex h-25 w-100">
            <a class="btn btn-warning m-0 font-weight-bold text-primary d-flex align-items-center" href="{{route('admin.questions.show', ['question' => $question, 'exam' => $question->exam])}}">
                Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.questions.answers.store', $question)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Answer Body</label>
                <textarea class="form-control" id="body" name='body' rows="3"></textarea>
                @error('body')
                <small class="form-text font-weight-bold text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="is_correct" name="is_correct">
                <label class="form-check-label" for="is_correct">
                    Correct answer
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
</div>
@endsection