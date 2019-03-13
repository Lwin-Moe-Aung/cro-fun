@extends('layout.master')
@section('title',ucfirst($page['data']['title']))

@section('container')
    <div class="container" style="margin-bottom: 200px;">
        <h1>{{ucfirst($page['data']['title'])}}</h1>
    {!! $page['data']['description'] !!}
    </div>

    
        @include('layout.footer')


@endsection
