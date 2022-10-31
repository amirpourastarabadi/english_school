@extends('admin.layouts.main')

@section('title', 'Admin | Exam {{$exam->getKey()}}')


@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <div class="col-9">
            <h1 class="com-0 font-weight-bold text-primary">Exam: {{$question->exam->title}}</h1>
            <h1 class="m-0 font-weight-bold text-primary">Question : {{$question->body}}</h1>
        </div>

        <a class="h-25 btn btn-success m-0 font-weight-bold text-primary d-flex align-items-center text-dark" href="{{route('admin.questions.answers.create', $question)}}">+ Add Answer</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>Answer</th>
                        <th>Is True</th>
                        <th>Created on</th>
                        <th>Updated on</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($question->answers as $answer)

                    <tr>
                        <td>
                            <a href="
                            {{route(
                                'admin.questions.answers.show', 
                                ['question' => $question, 'answer' => $answer]
                            )}}">
                                {{$answer->body}}
                            </a>
                        </td>
                        <td>
                            <i class="fa {{$answer->pivot->is_correct ? 'fa-check' : 'fa-times'}} " aria-hidden="true"></i>
                        </td>
                        <td>
                            <a href="{{route('admin.answers.show', $question)}}">
                                {{$answer->human_readable_created_at}}
                            </a>
                        </td>

                        <td>
                            <a href="{{route('admin.answers.show', $question)}}">
                                {{$answer->human_readable_updated_at}}
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