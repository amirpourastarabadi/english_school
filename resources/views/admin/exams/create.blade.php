@extends('admin.layouts.main')

@section('title', 'Admin | Exams')


@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h1 class="m-0 font-weight-bold text-primary">Create New Exam</h1>
        <a class="btn btn-warning m-0 font-weight-bold text-primary d-flex align-items-center" href="{{route('admin.exams.index')}}">Back</a>
    </div>
    <div class="card-body">
        <form action="{{route('admin.exams.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Exam Title</label>
                <input type="text" class="form-control" id="exam-title" name='title'>
                @error('title')
                <small class="form-text font-weight-bold text-danger">{{ $message }}</small>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
</div>
@endsection