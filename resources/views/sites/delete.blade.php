@extends('layouts.master')

@section('title')
    Delete Site
@stop


@section('content')

    <h1>Delete Site</h1>

    <p>
        Are you sure you want to delete the site <em>{{$site->sitename}}</em>?
    </p>

    <p>
        <a href='/sites/delete/{{$site->id}}'>Yes...</a>
    </p>

@stop
