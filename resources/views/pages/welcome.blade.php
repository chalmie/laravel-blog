@extends('app')

@section('title', '| Homepage')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        {{-- <h1 class="display-1">Hey there</h1> --}}
        <div class="title m-b-md">Hey there
          <p class="lead">Thanks so much for visiting. This is my attempt to create a blog with Laravel.</p>
        </div>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-8">

      @foreach($posts as $post)
        <div class="post">
          <h3>{{ $post->title }}</h3>
          <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
          <a href="#" class="btn btn-default">Read More</a>
        </div>
        <hr>
      @endforeach

    </div>
    <div class="col-md-3 col-md-offset-1">
      <h2>Sidebar</h2>
    </div>
  </div>
@endsection
