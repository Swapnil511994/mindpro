@extends('Partials.layout')
@section('content')
<div class="content-wrapper">
    <div class="jumbotron">
        <a href="{{route('Teachers.create')}}" class="btn btn-primary">Create New</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Contact
                    </th>
                    <th>
                        Gender
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                <td>{{$teacher->Name}}</td>
                <td>{{$teacher->Email}}</td>
                <td>{{$teacher->Contact}}</td>
                <td>{{$teacher->Gender == 0? "Male": "Female"}}</td>
                <td><a href="{{route('Teachers.edit',$teacher->TeacherId)}}" class="btn btn-primary">Edit</a></td>
                <td>
                <form method="POST" action="{{route('Teachers.destroy',$teacher->TeacherId)}}">
                    @csrf
                    @method('Delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                </form>
                </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection