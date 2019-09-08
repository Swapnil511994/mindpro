@extends('Partials.layout')
@section('content')
<div class="content-wrapper">
    <div class="jumbotron">
        <a href="{{route('Subject.create')}}" class="btn btn-primary">Create New</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Description
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($subjects as $sub)
                <tr>
                <td>{{$sub->Name}}</td>
                <td>{{$sub->Description}}</td>
                <td><a href="{{route('Subject.edit',$sub->SubjectId)}}" class="btn btn-primary">Edit</a></td>
                <td>
                <form method="POST" action="{{route('Subject.destroy',$sub->SubjectId)}}">
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