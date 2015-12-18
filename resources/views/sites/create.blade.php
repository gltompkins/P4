@extends('layouts.master')

@section('title')
Create Site
@stop


{{--
    This `head` section will be yielded right before the closing </head> tag.
    Use it to add specific things that *this* View needs in the head,
    such as a page specific styesheets.
    --}}
    @section('head')
    <link href="/css/sites/p4.css" type='text/css' rel='stylesheet'>
    @stop



    @section('content')

    <h1>Add a new Site</h1>

    @include('errors')

    <form method='POST' action='/sites/create'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <div class='form-group'>
            <label>* Site Name:</label>
            <input
            type='text'
            id='sitename'
            name='sitename'
            value='{{ old('siteurl','') }}'
            >
        </div>

        <div class='form-group'>
            <label>* Site URL:</label>
            <input
            type='text'
            id='siteurl'
            name='siteurl'
            value='{{ old('siteurl','') }}'
            >
        </div>

        <div class='form-group'>
            <label>* Site Description:</label>
            <input
            type='text'
            id='sitedesc'
            name='sitedesc'
            value='{{ old('sitedesc','') }}'
            >
        </div>

        <div class='form-group'>
            <label for='tags'>Tags</label>
            @foreach($tags_for_checkbox as $tag_id => $tag)
            <input type='checkbox' name='tags[]' value='{{$tag_id}}'> {{ $tag['name'] }}<br>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Add site</button>
    </form>

    @stop


    {{--
        This `body` section will be yielded right before the closing </body> tag.
        Use it to add specific things that *this* View needs at the end of the body,
        such as a page specific JavaScript files.
        --}}
        @section('body')
        {{-- <script src="/js/sites/create.js"></script> --}}
        @stop
