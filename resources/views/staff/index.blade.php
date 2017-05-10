@extends('layouts.app')
@include('layouts.error')

<?php

use Illuminate\Support\Facades\URL;

function buttonDelete($id)
{
    $format = '<a href="%s" data-toggle="tooltip" data-delete="%s" title="%s" class=""><i
            class="fa fa-trash-o"></i></a>';
    $link = "/staff/delete/$id";
    $token = csrf_token();
    $title = "Delete the doctor";
    return sprintf($format, $link, $token, $title);
};


?>
@section('content')
    <!--<ul>
        @foreach($staff as $st)
        <li><a href="/staff/edit/{{$st->id}}" >{{ $st->name }}</a></li>
        @endforeach
            </ul>-->
    <h1 class="page-heading">
        <i class="fa fa-user-md" aria-hidden="true">
        </i>Doctors</h1>

    <table id="staffId" class="table table-bordered table-responsive table-striped">
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

                </a>
            </th>
            </td>


        </tr>
        </thead>
        <tbody>
        @foreach($staff as $st)
            <tr>
                <td>{{ $st->name }}</td>
                @if (App::getLocale() =='ar')
                    <td>{{ $st->ar_specialty }}</td>
                @elseif (App::getLocale() =='en')
                    <td>{{ $st->en_specialty }}</td>
                @endif
                <td>{{ $st->mobile }}</td>
                <td>{{ $st->session_duration }}</td>
                <td>{{ $st->salary }}</td>
                @if (App::getLocale() =='ar')
                    <td>{{ $st->ar_days }}</td>
                @elseif (App::getLocale() =='en')
                    <td>{{ $st->en_days }}</td>
                @endif
                <td>
                    <a href="/staff/edit/{{$st->id}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit record"></i>
                    </a>
                {{--<a href="/staff/delete/{{$st->id}}" >--}}
                {{--<i class="fa fa-remove red" aria-hidden="true" title="Delete record"></i>--}}
                {{--</a>--}}

                {{--<a href="/staff/delete/{{$st->id}}">--}}
                {{--<i class="fa fa-remove" aria-hidden="true" title="delete"></i>--}}
                {{--<span class="glyphicon glyphicon-trash"></span>--}}
                {{--</a>--}}
                <!--                    -->

                    <?= buttonDelete($st->id) ?>

                </td>

            </tr>
        @endforeach

        </tbody>
        
    </table>

@endsection



@section('script')

    @if (App::getLocale() =='ar')
       <?php $r = "https:/cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"  ?>
    @elseif (App::getLocale() =='en')
        <?php $r = "https:/cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json" ?>
    @endif

    <script type="text/javascript">
        var url= "{{ $r }}" ;
        $(document).ready(function () {
            $('#staffId').DataTable({
                "language": {
                    "url": url
                }
            });
        });



    </script>
@endsection

