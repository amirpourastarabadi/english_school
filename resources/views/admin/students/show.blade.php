@extends('admin.layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$student->full_name}}</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle col-7 text-left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Exams
    </button>
    <!-- <div class="dropdown-menu col-6 d-flex" aria-labelledby="dropdownMenuButton"> -->
    <div class="dropdown-menu col-7" aria-labelledby="dropdownMenuButton">
        <table class="table table-dark " id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Take at</th>
                    <th>Score</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($student->exams as $exam)

                <tr>
                    <td>
                        <a class="text-white bolder" href="{{route('admin.students.show', $student)}}">
                            {{$exam->title}}
                        </a>
                    </td>
                    <td>
                        {{$exam->pivot->take_at}}
                    </td>
                    <td>
                        {{$exam->pivot->score}}
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

</div>

@endsection