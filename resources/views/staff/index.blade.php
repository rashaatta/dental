@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h3>Staff</h3>
        </div>
        <div class="col-md-offset-10 col-md-2">
            <form>
                <div class="form-group">
                    <button class="btn btn-primary form-control">Add Staff</button>

                </div>
            </form>
        </div>

    </div>
    <br/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <td>Name</td>
            <td>Manage</td>
        </tr>
        </thead>
        <tbody>
        @foreach($staff as $st)
            <tr>
                <td>{{ $st->name }}</td>
                <td>
                    <a href="/staff/edit/{{$st->id}}">
                        <span class="glyphicon glyphicon-edit" title="edit"></span>
                    </a>
                    <a href="/staff/delete/{{$st->id}}">
                        <span class="glyphicon glyphicon-trash" title="delete"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @include('layouts.error')

@endsection