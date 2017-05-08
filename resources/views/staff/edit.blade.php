@extends('layouts.app')

@section('content')
    <h1>@lang('staff.header')</h1>

    <form class="form-horizontal" method="post" action="/staff/edit/{{ $staff->id }}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name" class="control-label col-md-2">@lang('staff.name'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $staff->name }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="control-label col-md-2">@lang('staff.address'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="address" name="address" value="{{ $staff->address }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="mobile" class="control-label col-md-2">@lang('staff.mobile'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $staff->mobile }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="telephone" class="control-label col-md-2">@lang('staff.telephone'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="telephone" name="telephone"
                       value="{{ $staff->telephone }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="specialty" class="control-label col-md-2">@lang('staff.specialty'): </label>
            <div class="col-md-10">

                <select class="form-control" id="specialty" name="specialty">
                    @if (App::getLocale() =='ar')
                        @foreach (Config::get('staff.ar_specialist') as $sp => $specialist)
                            <option value="{{$sp}}" @if($staff->specialty  == $sp)      selected   @endif>{{$specialist}}</option>
                        @endforeach
                    @elseif (App::getLocale() =='en')
                        @foreach (Config::get('staff.en_specialist') as $sp => $specialist)
                            <option value="{{$sp}}"  @if($staff->specialty  == $sp)      selected   @endif >{{$specialist}}</option>
                        @endforeach
                    @endif

                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="salary" class="control-label col-md-2">@lang('staff.salary'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="salary" name="salary" value="{{ $staff->salary }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="percent" class="control-label col-md-2">@lang('staff.percent'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="percent" name="percent" value="{{ $staff->percent }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="session_duration" class="control-label col-md-2">@lang('staff.session_duration'): </label>
            <div class="col-md-10">
                <input type="time" class="form-control" id="session_duration" name="session_duration"
                       value="{{ $staff->session_duration }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="entry_time" class="control-label col-md-2">@lang('staff.entry_time'): </label>
            <div class="col-md-10">
                <input type="time" class="form-control" id="entry_time" name="entry_time"
                       value="{{ $staff->entry_time }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="exit_time" class="control-label col-md-2">@lang('staff.exit_time'): </label>
            <div class="col-md-10">
                <input type="datetime" class="form-control" id="exit_time" name="exit_time"
                       value="{{ $staff->exit_time }}"/>
            </div>
        </div>


        <div class="form-group">
            <label for="entry_time" class="control-label col-md-2">@lang('staff.workdays'): </label>
            <div class="col-md-10">
                @if (App::getLocale() =='ar')
                    @foreach (Config::get('staff.ar_workdays') as $wd=> $workdays)
                        <input type="checkbox" value="{{$wd}}"><span> {{$workdays}}</span>
                    @endforeach
                @elseif (App::getLocale() =='en')
                    @foreach (Config::get('staff.en_workdays') as $wd=> $workdays)
                        <input type="checkbox" value="{{$wd}}"><span> {{$workdays}}</span>
                    @endforeach
                @endif
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-offset-2 col-md-2">
                <button type="submit" class="form-control btn btn-primary pull-right">
                    <i class="fa fa-backward"></i> <span>@lang('staff.btnSave')</span></button>
            </div>
            <div class="col-md-offset-2 col-md-2">

                <a href="/staff" class="form-control btn btn-primary">@lang('staff.btnCancel')</a>

            </div>
        </div>
    </form>

    <br/>
    @include('layouts.error')
@endsection