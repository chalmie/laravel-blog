@extends('app')

@section('title', '| Blog')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <h2>Blog</h2>

    </div>
  </div>

  @foreach ($posts as $post)
    <div class="row">
      <div class="col-md-12 col-md-offset-2">
        <h2>{{ $post->title }}</h2>
        <h5>Published: {{ date('M j, Y h:i', strtotime($post->created_at)) }}</h5>
        <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : '' }}</p>
        <a href="{{ route('blog.single', $post->slug) }}">Read More</a>
      </div>
    </div>
  @endforeach

@endsection
