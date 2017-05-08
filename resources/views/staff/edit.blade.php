@extends('layouts.app')

@section('content')

    <form class="form-horizontal" method="post" action="/staff/edit/{{ $staff->id }}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name" class="control-label col-md-2">Name : </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $staff->name }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="control-label col-md-2">address : </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="address" name="address" value="{{ $staff->address }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="mobile" class="control-label col-md-2">mobile : </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $staff->mobile }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="telephone" class="control-label col-md-2">telephone : </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="telephone" name="telephone"
                       value="{{ $staff->telephone }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="specialty" class="control-label col-md-2">specialty : </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="specialty" name="specialty"
                       value="{{ $staff->specialty }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="salary" class="control-label col-md-2">salary : </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="salary" name="salary" value="{{ $staff->salary }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="percent" class="control-label col-md-2">percent : </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="percent" name="percent" value="{{ $staff->percent }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="session_duration" class="control-label col-md-2">session duration : </label>
            <div class="col-md-10">
                <input type="time" class="form-control" id="session_duration" name="session_duration"
                       value="{{ $staff->session_duration }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="entry_time" class="control-label col-md-2">entry time : </label>
            <div class="col-md-10">
                <input type="time" class="form-control" id="entry_time" name="entry_time"
                       value="{{ $staff->entry_time }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="exit_time" class="control-label col-md-2">exit time : </label>
            <div class="col-md-10">
                <input type="datetime" class="form-control" id="exit_time" name="exit_time"
                       value="{{ $staff->exit_time }}"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-2">
                <button type="submit" class="form-control btn btn-primary">Save</button>
            </div>
        </div>
    </form>

    <br/>
    @include('layouts.error')
@endsection