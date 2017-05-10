@extends('layouts.app')

@section('content')
    <h1 class="page-heading"><i class="fa fa-user-md" aria-hidden="true">
        </i> @lang('staff.header')</h1>

    <form class="form-horizontal editDoctor" method="post" action="/staff/edit/{{ $staff->id }}">
        {{csrf_field()}}

        <div class="row">
            <div class="form-group col-md-8">
                <label for="name" class="control-label col-md-2">@lang('staff.name'): </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $staff->name }}"/>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="mobile" class="control-label col-md-2">@lang('staff.mobile'): </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $staff->mobile }}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                <label for="specialty" class="control-label col-md-2">@lang('staff.specialty'): </label>
                <div class="col-md-10">

                    <select class="form-control" id="specialty_id" name="specialty_id">
                        @if (App::getLocale() =='ar')
                            @foreach ($specialty as $sp)
                                <option value="{{$sp->id}}"
                                        @if($staff->specialty_id  == $sp->id)      selected @endif>{{$sp->ar_value}}</option>
                            @endforeach
                        @elseif (App::getLocale() =='en')
                            @foreach ($specialty as $sp)
                                <option value="{{$sp->id}}"
                                        @if($staff->specialty_id  == $sp->id)      selected @endif >{{$sp->en_value}}</option>
                            @endforeach
                        @endif

                    </select>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="telephone" class="control-label col-md-2">@lang('staff.telephone'): </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="telephone" name="telephone"
                           value="{{ $staff->telephone }}"/>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="form-group col-md-12 ">
                <label for="address" class="control-label col-md-2">@lang('staff.address'): </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="address" name="address" value="{{ $staff->address }}"/>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-md-4">
                <label for="salary" class="control-label col-md-2">@lang('staff.salary'): </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="salary" name="salary" value="{{ $staff->salary }}"/>
                </div>
            </div>
            <div class="form-group  col-md-4">
                <label for="percent" class="control-label col-md-2">@lang('staff.percent'): </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="percent" name="percent" value="{{ $staff->percent }}"/>
                </div>
            </div>
            <div class="form-group  col-md-4">
                <label for="session_duration" class="control-label col-md-2">@lang('staff.session_duration'): </label>
                <div class="col-md-10">
                    <input type="time" class="form-control" id="session_duration" name="session_duration"
                           value="{{ $staff->session_duration }}"/>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="form-group col-md-4">
                <label for="entry_time" class="control-label col-md-2">@lang('staff.entry_time'): </label>
                <div class="col-md-10">
                    <input type="time" class="form-control" id="entry_time" name="entry_time"
                           value="{{ $staff->entry_time }}"/>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="exit_time" class="control-label col-md-2">@lang('staff.exit_time'): </label>
                <div class="col-md-10">
                    <input type="datetime" class="form-control" id="exit_time" name="exit_time"
                           value="{{ $staff->exit_time }}"/>
                </div>
            </div>


            <div class="form-group col-md-12 sectionStyle">
                <label for="entry_time" class="control-label col-md-2">@lang('staff.workdays'): </label>
                <div class="col-md-10">

                    @if (App::getLocale() =='ar')
                        @foreach ($days as $d)
                            <input type="checkbox" value="{{$d->id}}"  name="{{$d->id}}"  @if ($swd->contains($d->id)))
                                   checked @endif >
                            <span> {{$d->ar_value}}</span>
                        @endforeach
                    @elseif (App::getLocale() =='en')
                        @foreach ($days as $d)
                            <input type="checkbox" value="{{$d->id}}" name="{{$d->id}}" @if ($swd->contains($d->id)))
                                   checked @endif >
                            <span> {{$d->en_value}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="formButtons">
                <button type="submit" class=" btn btn-primary pull-right">
                    <i class="fa fa-backward"></i> <span>@lang('staff.btnSave')</span></button>


                <a href="/staff" class=" btn btn-primary">@lang('staff.btnCancel')</a>

            </div>
        </div>
    </form>

    <br/>
    @include('layouts.error')
@endsection