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

    <table  id="staffId" class="table table-bordered table-responsive table-striped">
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


@section('script')

    <script type="text/javascript">

        $(document).ready(function() {
            $('#staffId').DataTable();
        } );

        // Jquery function which listens for click events on elements which have a data-delete attribute
        $('[data-delete]').click(function(e){
            e.preventDefault();
            // If the user confirm the delete
            if (confirm('Do you really want to delete the element ?')) {
                // Get the route URL
                var url = $(this).prop('href');
                // Get the token
                var token = $(this).data('delete');
                // Create a form element
                var $form = $('<form/>', {action: url, method: 'get'});
                // Add the DELETE hidden input method
                var $inputMethod = $('<input/>', {type: 'hidden', name: '_method', value: 'get'});
                // Add the token hidden input
                var $inputToken = $('<input/>', {type: 'hidden', name: '_token', value: token});
                // Append the inputs to the form, hide the form, append the form to the <body>, SUBMIT !
                $form.append($inputMethod, $inputToken).hide().appendTo('body').submit();
//                console.log('done!!!!');
            }
        });

    </script>
@endsection

