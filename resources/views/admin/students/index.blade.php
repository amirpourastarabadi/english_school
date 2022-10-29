@extends('admin.layouts.main')


@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary">Students</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->

                <tbody>
                    @foreach ($students as $student)

                    <tr>
                        <td>
                            <a href="{{route('admin.students.show', $student)}}">
                                {{$student->first_name}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.students.show', $student)}}">
                                {{$student->last_name}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.students.show', $student)}}">
                                {{$student->mobile}}
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