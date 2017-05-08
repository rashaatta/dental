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
            <th>الأدوات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($staff as $st)
        <tr>


            <td>{{ $st->name }}</td>
            <td><a href=""><i class="fa fa-plus" aria-hidden="true"></i></a>
                <a href="/staff/edit/{{$st->id}}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>

        </tr>
        @endforeach

        </tbody>
    </table>

@endsection