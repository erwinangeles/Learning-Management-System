@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Courses</h1>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @elseif(session()->has('danger-message'))
            <div class="alert alert-danger">
                {{ session()->get('danger-message') }}
            </div>
        @endif
        <style>
            .float-right {
                float: right !important;

            . row > & {
                margin-left: auto !important;
            }
            }
        </style>
        <br/>
        <a href="{{route('admin.courses.create')}}" target="_blank" class="btn float-right btn-primary">Create New Course</a>
        <br/>
        <br>
        <br>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
            @forelse($courses as $course)

                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{$course->course_name}}</td>
                    <td>{{$course->course_slug}}</td>
                    <td> <a href="{{ route('admin.courses.edit', $course->id) }}" target="_blank" class="btn btn-xs btn-info">Edit</a>
                        <a href="{{url('admin/modules?course_id=')}}{{$course->id}}" target="_blank" class="btn btn-xs btn-warning">Edit Modules</a>
                        <form method="POST" action="{{route('admin.courses.destroy', $course->id)}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this course?')"
                                   class="btn btn-xs btn-danger" />
                        </form>


                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="2">No records found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
