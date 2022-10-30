@extends('admin.layouts.main')

@section('title', 'Admin | Exam {{$exam->getKey()}}')


@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h1 class="m-0 font-weight-bold text-primary">Exam: {{$exam->title}}</h1>
        <a class="btn btn-success m-0 font-weight-bold text-primary d-flex align-items-center text-dark" href="{{route('admin.question.create', $exam)}}">+ Add Question</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Question Type</th>
                        <th>Created on</th>
                        <th>Updated on</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($exam->questions as $question)

                    <tr>
                        <td>
                            <a href="{{route('admin.questions.show', $question)}}">
                                {{$question->body}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.questions.type.index', $question->type)}}">
                                {{$question->type}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.questions.show', $question)}}">
                                {{$question->human_readable_created_at}}
                            </a>
                        </td>

                        <td>
                            <a href="{{route('admin.questions.show', $question)}}">
                                {{$question->human_readable_updated_at}}
                            </a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection