@extends('layouts.app')

@section('content')
    <!--<ul>
        @foreach($staff as $st)
        <li><a href="/staff/edit/{{$st->id}}" >{{ $st->name }}</a></li>
        @endforeach
            </ul>-->
    <h1 class="page-heading">
        <i class="fa fa-user-md" aria-hidden="true">
        </i>Doctors</h1>

    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>@lang('staff.name')</th>
            <th>@lang('staff.specialty')</th>
            <th>@lang('staff.mobile')</th>
            <th>@lang('staff.session_duration')</th>
            <th>@lang('staff.salary')</th>
            <th>@lang('staff.workdays')</th>

            <th>
                <a href="/staff/add/">
                    <i class="fa fa-user-plus green"></i>
                </a>
            </th>
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach($staff as $st)
            <tr>
                <td>{{ $st->name }}</td>
                <td>{{ $st->specialty }}</td>
                <td>{{ $st->mobile }}</td>
                <td>{{ $st->session_duration }}</td>
                <td>{{ $st->salary }}</td>
                <td>{{ $st->days }}</td>
                <td>
                    <a href="/staff/edit/{{$st->id}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit record"></i>
                    </a>
                    <a href="/staff/delete/{{$st->id}}" >
                        <i class="fa fa-remove red" aria-hidden="true" title="Delete record"></i>
                    </a>



                </td>

            </tr>
        @endforeach

        </tbody>
        <tfoot class="tablehead">
        <tr>
            <td colspan="7">
                <div class="col-sm-8">
                    <span><small>Total: {{count($staff)}} </small></span>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <span><small>Page: {{count($staff)}} </small></span>
                </div>
            </td>
        </tr>
        </tfoot>
    </table>

@endsection
