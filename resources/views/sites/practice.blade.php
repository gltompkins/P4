@extends('layouts.master')


@section('title')
    Show site practice
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop


@section('content')
    <h1>Show Architecture Sites: (in practice.blade.php)</h1>
    @foreach($sites as $site)
        echo TEST<br>';
        <li>sitename: {{ $site->sitename}}</li>

    @endforeach

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
