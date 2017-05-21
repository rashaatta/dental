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
                            <form id="deletionForm" method="POST" action="/staff/delete">
                                {{ csrf_field() }}
                                <input id="doctor-delete-id" name="doctor-delete-id" type="hidden" value="0"/>
                                <p>Are you sure you want to delete this doctor? </p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="submitDelete" type="button" class="btn btn-primary">Delete</button>
                            <button class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>


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
                    <a href="#">
                        <i class="glyphicon glyphicon-trash red" id="{{ $st->id }}" aria-hidden="true"
                           title="Delete record"
                           data-target="#confirmDelete" data-toggle="modal"></i>
                    </a>

                    {{--<a href="/staff/delete/{{$st->id}}">--}}
                    {{--<i class="fa fa-remove" aria-hidden="true" title="delete"></i>--}}
                    {{--<span class="glyphicon glyphicon-trash"></span>--}}
                    {{--</a>--}}

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
            $('#staffId').DataTable({
                "language": {
                    "url": url
                }
            });

            $('.glyphicon.glyphicon-trash.red').click(function () {
                var id = $(this).attr('id');
                $('#doctor-delete-id').attr('value', id);
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

