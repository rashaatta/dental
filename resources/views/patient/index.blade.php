@extends('layouts.app')
@include('layouts.error')

<?php
/**
 * Created by PhpStorm.
 * User: Rasha
 * Date: 5/10/2017
 * Time: 2:03 PM
 */
use Illuminate\Support\Facades\URL;

function buttonDelete($id)
{
    $format = '<a href="%s" data-toggle="tooltip" data-delete="%s" title="%s" class=""><i
            class="fa fa-trash-o"></i></a>';
    $link = "/patient/delete/$id";
    $token = csrf_token();
    $title = "Delete the doctor";
    return sprintf($format, $link, $token, $title);
};


?>
@section('content')

    <h1 class="page-heading">
        <i class="fa fa-user-md" aria-hidden="true">
        </i>Patients</h1>

    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>@lang('patient.name')</th>

            <th>
                <a href="/patient/add">
                    <i class="fa fa-user-plus green"></i>
                </a>

                </a>
            </th>
            </td>


        </tr>
        </thead>
        <tbody>

        <tr>
            <td></td>
            <td>
                <a href="/patient/edit/1">
                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit record"></i>
                </a>

            <?= buttonDelete(1) ?>
            </td>
        </tr>


        </tbody>
        <tfoot class="tablehead">
        <tr>
            <td colspan="7">
                <div class="col-sm-8">
                    <span><small>Total: 0 </small></span>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <span><small>Page: 0 </small></span>
                </div>
            </td>
        </tr>
        </tfoot>
    </table>

@endsection


@section('script')

    <script type="text/javascript">

        // Jquery function which listens for click events on elements which have a data-delete attribute
        $('[data-delete]').click(function (e) {
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

