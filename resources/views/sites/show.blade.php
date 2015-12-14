@extends('layouts.master')


@section('title')
    Show site
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
    <h1>Show Architecture Sites: (in show.blade.php)</h1>
    <li>siteID: {{ $sites->id}}</li>
    <li>SiteUrl: {{ $sites->siteurl}}</li>
    <li>sitedesc: {{ $sites->sitedesc}}</li>
    <li>sitename: {{ $sites->sitename}}</li>
    <li>created_at: {{ $sites->created_at}}</li>
    <li>updated_at: {{ $sites->updated_at}}</li>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
