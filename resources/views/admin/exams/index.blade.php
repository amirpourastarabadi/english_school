@extends('admin.layouts.main')

@section('title', 'Admin | Exams')


@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h1 class="m-0 font-weight-bold text-primary">Exams</h1>
        <a class="btn btn-success m-0 font-weight-bold text-primary d-flex align-items-center text-dark" href="{{route('admin.exams.create')}}">+ New Exam</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>Title</th>
                        <th>questions (no)</th>
                        <th>no of students take it</th>
                        <th>Created on</th>
                        <th>Updated on</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($exams as $exam)

                    <tr>
                        <td>
                            <a href="{{route('admin.exams.show', $exam)}}">
                                {{$exam->title}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.exams.show', $exam)}}">
                                {{$exam->number_of_questions}}
                            </a>
                        </td>
                        <td>
                            <a href="#">
                                {{$exam->number_of_students_take_it}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.exams.show', $exam)}}">
                                {{$exam->human_readable_created_at}}
                            </a>
                        </td>

                        <td>
                            <a href="{{route('admin.exams.show', $exam)}}">
                                {{$exam->human_readable_updated_at}}
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