@extends('layouts.app')

@section('content')
    <ul>
        @foreach($staff as $st)
            <li><a href="/staff/edit/{{$st->id}}" >{{ $st->name }}</a></li>
        @endforeach
    </ul>
@endsection