@extends('layouts.master')


@section('title')
    Show book
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    <link href="/css/sites/p4.css" type='text/css' rel='stylesheet'>
@stop


@section('content')
<div class="container-fluid">
    <h1>Architecure Sites - Full List</h1>

    <div class="row">
        @foreach($sites as $site)
            <div class="col-md-4">{{ $site->sitename}}</div>
            <div class="col-md-1">peer rating '4 stars'</div>
            <div class="col-md-4"><a href='{{$site->siteurl}}'>{{$site->siteurl}}</a>
                <br><br><div>
        @endforeach
    </div>
</div>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
