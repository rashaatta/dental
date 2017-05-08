@extends('layouts.app')

@section('content')
    <!--<ul>
        @foreach($staff as $st)
        <li><a href="/staff/edit/{{$st->id}}" >{{ $st->name }}</a></li>
        @endforeach
            </ul>-->
    <h1 class="page-heading"><i class="fa fa-user-md" aria-hidden="true"></i>
        Doctors</h1>

    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>اسم الطبيب</th>
            <th>
                <a href="/staff/add/">
                    <i class="fa fa-plus" aria-hidden="true" title="add"></i>
                    {{--<span class="glyphicon glyphicon-trash"></span>--}}
                </a></td>

            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($staff as $st)
            <tr>


                <td>{{ $st->name }}</td>
                <td><a href="/staff/edit/{{$st->id}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true" title="edit"></i>
                        {{--<span class="glyphicon glyphicon-edit"></span>--}}
                    </a>
                    <a href="/staff/delete/{{$st->id}}">
                        <i class="fa fa-remove" aria-hidden="true" title="delete"></i>
                        {{--<span class="glyphicon glyphicon-trash"></span>--}}
                    </a></td>

            </tr>
        @endforeach

        </tbody>
    </table>

@endsection