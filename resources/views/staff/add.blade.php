@extends('resources.views.layouts.app')

@section('content')
    <h1 class="page-heading"><i class="fa fa-user-md" aria-hidden="true">
        </i>@lang('staff.header')</h1>
    @include('layouts.error')
    <form class="form-horizontal editDoctor" method="post" action="/staff/add/">
        {{csrf_field()}}
        <div class="row">
            <div class="form-group col-md-8">
                <label for="name" class="control-label col-md-2">@lang('staff.name'): </label>
                <div class="col-md-10">

                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"/>

                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="mobile" class="control-label col-md-2">@lang('staff.mobile'): </label>
                <div class="col-md-10">

                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}"/>

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
                                <option value="{{$sp->id}}">{{$sp->ar_value}}</option>
                            @endforeach
                        @elseif (App::getLocale() =='en')
                            @foreach ($specialty as $sp)
                                <option value="{{$sp->id}}">{{$sp->en_value}}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="telephone" class="control-label col-md-2">@lang('staff.telephone'): </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="telephone" name="telephone"
                           value="{{ old('telephone') }}"/>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="address" class="control-label col-md-2">@lang('staff.address'): </label>
                <div class="col-md-10">

                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"/>

                </div>
            </div>
        </div>
        <div class="row">
            {{--<div class="form-group col-md-4">--}}
            {{--<label for="salary" class="control-label col-md-2">@lang('staff.salary'): </label>--}}
            {{--<div class="col-md-10">--}}
            {{--<input type="text" class="form-control" id="salary" name="salary" value="{{ old('salary') }}"/>--}}
            {{--</div>--}}
            {{--</div>--}}

            <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                    <label for="salary" class="control-label col-md-2">@lang('staff.salary'): </label>
                    <div class="col-md-10">

                        <input type="text" class="form-control" id="salary" name="salary" value="{{ old('salary') }}"/>

                    </div>
                </div>
            </div>


            <div class="form-group col-md-4">
                <label for="percent" class="control-label col-md-2">@lang('staff.percent'): </label>
                <div class="col-md-10">

                    <input type="text" class="form-control" id="percent" name="percent" value="{{ old('percent') }}"/>

                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="session_duration" class="control-label col-md-2">@lang('staff.session_duration'): </label>
                <div class="col-md-4">
                    {{--<input type="time" class="form-control" id="session_duration" name="session_duration"--}}

                    {{--value="{{ old('session_duration') }}"/>--}}
                    <select class="form-control" id="session_duration">
                        @for($i = 5;$i <= 60 ;$i += 5)
                            <option @if (old('session_duration') == $i) selected @endif value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>Minutes

                </div>
            </div>
<div class="clearfix"></div>
            <div >
                <div class="form-group col-md-4">
                    <label for="entry_time" class="control-label col-md-2">@lang('staff.entry_time'): </label>
                    <div class="col-md-10">
                        <input type="time" class="form-control" id="entry_time" name="entry_time"

                               value="{{ old('entry_time') }}"/>

                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="exit_time" class="control-label col-md-2">@lang('staff.exit_time'): </label>
                    <div class="col-md-10">
                        <input type="datetime" class="form-control" id="exit_time" name="exit_time"
                               value="{{ old('exit_time') }}"/>

                    </div>
                </div>
            </div>

            <div class="form-group col-md-12  sectionStyle">
                <label for="entry_time" class="control-label col-md-2">@lang('staff.workdays'): </label>
                <div class="col-md-10">
                    @if (App::getLocale() =='ar')
                        @foreach ($days as $d)
                            <input type="checkbox" name="{{$d->id}}" value="{{$d->id}}"><span> {{$d->ar_value}}</span>
                        @endforeach
                    @elseif (App::getLocale() =='en')
                        @foreach ($days as $d)
                            <input type="checkbox" name="{{$d->id}}" value="{{$d->id}}"><span> {{$d->en_value}}</span>
                        @endforeach
                    @endif
                </div>
            </div>


            <div class="form-group formButtons">


                <button type="submit" class="btn btn-primary"><i class="fa fa-backward"></i>
                    <span>@lang('staff.btnSave')</span></button>

                <a href="/staff" class=" btn btn-primary">@lang('staff.btnCancel')</a>

            </div>
        </div>
    </form>

    <br/>

@endsection