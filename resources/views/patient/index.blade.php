@extends('layouts.app')
@include('layouts.error')

@section('content')

    <div class="modal" id="confirmDelete" data-keyboard="false" data-backdrop="static" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <form id="deletionForm" method="POST" action="/patient/delete">
                        {{ csrf_field() }}
                        <input id="patient-delete-id" name="patient-delete-id" type="hidden" value="0"/>
                        <p>Are you sure you want to delete this patient ? </p>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="submitDelete" type="button" class="btn btn-primary">Delete</button>
                    <button class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    {{--@foreach($patients as $pat)--}}
        {{--<li><a href="/patient/edit/{{$pat->id}}" >{{ $pat->name }}</a></li>--}}
    {{--@endforeach--}}

    <h1 class="page-heading">
        <i class="fa fa-user-md" aria-hidden="true">
        </i>Patients</h1>

    <table id="patientId" class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>@lang('patient.name')</th>
            <th>@lang('patient.mobile')</th>
            <th>@lang('patient.telephone')</th>
            <th>@lang('patient.address')</th>
            <th>@lang('patient.corporation')</th>
            <th>@lang('patient.birthday')</th>
            <th>@lang('patient.job')</th>

            <th>
                <a href="/patient/add">
                    <i class="fa fa-user-plus green"></i>
                </a>

                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($patients as $pat)
            <tr>
                <td>{{$pat->name}}</td>
                <td>{{$pat->mobile}}</td>
                <td>{{$pat->telephone}}</td>
                <td>{{$pat->address}}</td>
                <td>{{$pat->corporation_name}}</td>
                <td>{{$pat->birthday}}</td>
                <td>{{$pat->job}}</td>
                <td>

                    <a href="/patient/edit/{{$pat->id}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit record"></i>
                    </a>

                    <a href="#">
                        <i class="glyphicon glyphicon-trash red" id={{ $pat->id }} aria-hidden="true"
                           title="Delete record"
                           data-target="#confirmDelete" data-toggle="modal"></i>
                    </a>
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
        var url = "{{ $r }}";
        $(document).ready(function () {
            $('#patientId').DataTable({
                "language": {
                    "url": url
                }
            });

            $('.glyphicon.glyphicon-trash.red').click(function () {
                var id = $(this).attr('id');
                $('#patient-delete-id').attr('value', id);
//                $('#confirmDelete').toggle('show');
//                alert(id);
            });

            $('#submitDelete').click(function () {
                $('#deletionForm').submit();
                $('confirmDelete').modal('hide');
            });
        });


    </script>
@endsection

