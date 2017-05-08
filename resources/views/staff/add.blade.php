@extends('layouts.app')

@section('content')
    <h1>@lang('staff.header')</h1>

    <form class="form-horizontal" method="post" action="/staff/add/">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name" class="control-label col-md-2">@lang('staff.name'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name" value=""/>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="control-label col-md-2">@lang('staff.address'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="address" name="address" value=""/>
            </div>
        </div>
        <div class="form-group">
            <label for="mobile" class="control-label col-md-2">@lang('staff.mobile'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="mobile" name="mobile" value=""/>
            </div>
        </div>
        <div class="form-group">
            <label for="telephone" class="control-label col-md-2">@lang('staff.telephone'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="telephone" name="telephone"
                       value=""/>
            </div>
        </div>
        <div class="form-group">
            <label for="specialty" class="control-label col-md-2">@lang('staff.specialty'): </label>
            <div class="col-md-10">

                <select class="form-control" id="specialty" name="specialty">
                    @if (App::getLocale() =='ar')
                        @foreach (Config::get('staff.ar_specialist') as $sp => $specialist)
                            <option value="{{$sp}}">{{$specialist}}</option>
                        @endforeach
                    @elseif (App::getLocale() =='en')
                        @foreach (Config::get('staff.en_specialist') as $sp => $specialist)
                            <option value="{{$sp}}">{{$specialist}}</option>
                        @endforeach
                    @endif
                </select>
             <!--   <select class="form-control" id="specialty" name="specialty">

                    {{--@foreach(['item1'=>'1', 'item2'=>'2','item3'=>'3']  as $spi=>$spe)--}}
                    {{--<option value="{{$spe}}">{{$spi}}</option>--}}
                    {{--@endforeach--}}

                    <option value="General">@lang('staff.General')</option>
                    <option value="Gum">@lang('staff.Gum')</option>
                    <option value="Orthodontist">@lang('staff.Orthodontist')</option>
                    <option value="Pediatric">@lang('staff.Pediatric')</option>
                    <option value="Preventive">@lang('staff.Preventive')</option>
                    <option value="maxillofacial">@lang('staff.maxillofacial')</option>
                    <option value="prosthetic">@lang('staff.prosthetic')</option>
                    <option value="OralDisease">@lang('staff.OralDisease')</option>
                    <option value="roottreatment">@lang('staff.roottreatment')</option>
                    <option value="OralDisease">@lang('staff.conservative')</option>

                </select>-->

            </div>
        </div>
        <div class="form-group">
            <label for="salary" class="control-label col-md-2">@lang('staff.salary'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="salary" name="salary" value=""/>
            </div>
        </div>
        <div class="form-group">
            <label for="percent" class="control-label col-md-2">@lang('staff.percent'): </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="percent" name="percent" value=""/>
            </div>
        </div>
        <div class="form-group">
            <label for="session_duration" class="control-label col-md-2">@lang('staff.session_duration'): </label>
            <div class="col-md-10">
                <input type="time" class="form-control" id="session_duration" name="session_duration"
                       value=""/>
            </div>
        </div>
        <div class="form-group">
            <label for="entry_time" class="control-label col-md-2">@lang('staff.entry_time'): </label>
            <div class="col-md-10">
                <input type="time" class="form-control" id="entry_time" name="entry_time"
                       value=""/>
            </div>
        </div>
        <div class="form-group">
            <label for="exit_time" class="control-label col-md-2">@lang('staff.exit_time'): </label>
            <div class="col-md-10">
                <input type="datetime" class="form-control" id="exit_time" name="exit_time"
                       value=""/>
            </div>
        </div>


        <div class="form-group">
            <label for="entry_time" class="control-label col-md-2">@lang('staff.workdays'): </label>
            <div class="col-md-10">
                <input type="checkbox" value="Saturday"><span>@lang('staff.Saturday')</span>
                <input type="checkbox" value="Sunday"><span>@lang('staff.Sunday')</span>
                <input type="checkbox" value="Monday"><span>@lang('staff.Monday')</span>
                <input type="checkbox" value="Tuesday"><span>@lang('staff.Tuesday')</span>
                <input type="checkbox" value="Wednesday"><span>@lang('staff.Wednesday')</span>
                <input type="checkbox" value="Thursday"><span>@lang('staff.Thursday')</span>
                <input type="checkbox" value="Friday"><span>@lang('staff.Friday')</span>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-offset-2 col-md-2">
                <button type="submit" class="form-control btn btn-primary pull-right">
                    <i class="fa fa-backward"></i> <span>@lang('staff.btnSave')</span></button>
            </div>
            <div class="col-md-offset-2 col-md-2">
                <button class="form-control btn btn-primary pull-right" data-ui-sref="/staff/">
                    <i class="fa fa-close"></i> <span>@lang('staff.btnCancel')</span>
                </button>
            </div>
        </div>
    </form>

    <br/>
    @include('layouts.error')
@endsection