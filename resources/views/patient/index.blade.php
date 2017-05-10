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

@endsection

