@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">

        @foreach($posts as $post)
            @include('posts.blogpost')
        @endforeach
    </div><!-- /.blog-main -->

@endsection