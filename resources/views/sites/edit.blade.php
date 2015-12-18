@extends('layouts.master')


@section('title')
    Edit site
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
    <h1>Edit Architecture Sites</h1>

    @include('errors')

    <form method='POST' action='/sites/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $site->id }}'>

        <div class='form-group'>
            <label>* Site URL:</label>
            <input
                type='text'
                id='siteurl'
                name='siteurl'
                value='{{$site->siteurl}}'
            >
        </div>

        <div class='form-group'>
            <label>* Site Name:</label>
            <input
                type='text'
                id='sitename'
                name='sitename'
                value='{{$site->sitename}}'
            >
        </div>

        <div class='form-group'>
            <label>* Site Description:</label>
            <input
                type='text'
                id='sitedesc'
                name='sitedesc'
                value='{{$site->sitedesc}}'
            >
        </div>

        <div class='form-group'>
            <label for='tags'>Tags</label>
            @foreach($tags_for_checkbox as $tag_id => $tag)
                <?php $checked = (in_array($tag['name'],$tags_for_this_site)) ? 'CHECKED' : '' ?>
                <input {{ $checked }} type='checkbox' name='tags[]' value='{{$tag_id}}'> {{ $tag['name'] }}<br>
            @endforeach
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
