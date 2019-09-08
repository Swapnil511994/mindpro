@extends('Partials.layout')
@section('content')
<div class="content-wrapper">
    <div class="jumbotron">
        <a href="{{route('Classes.create')}}" class="btn btn-primary">Create New</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th></th><th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($classes as $cls)
                <tr>
                <td>{{$cls->Name}}</td>
                <td><a href="{{route('Classes.edit',$cls->ClassId)}}" class="btn btn-primary">Edit</a></td>
                <td>
                <form method="POST" action="{{route('Classes.destroy',$cls->ClassId)}}">
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