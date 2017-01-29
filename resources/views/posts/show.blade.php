@extends('app')

@section('title', '| Display Posts')

@section('content')

  <div class="row">
    <div class="col-md-8">
      <h1>{{ $post->title }}</h1>

      <p class="lead">{{ $post->body }}</p>
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>URL:</label>
          <a href="{{ url('blog/' . $post->slug) }}">{{ url('blog/' . $post->slug) }}</a>
        </dl>
        <dl class="dl-horizontal">
          <label>Category:</label>
          {{ $post->category->name }}
        </dl>
        <dl class="dl-horizontal">
          <label>Created at:</label>
          {{ date('M j, Y h:i', strtotime($post->created_at)) }}
        </dl>
        <dl class="dl-horizontal">
          <label>Updated at:</label>
          {{ date('M j, Y h:i', strtotime($post->updated_at)) }}
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute(
              'posts.edit',
              'Edit',
              array($post->id),
              array('class' => 'btn btn-warning btn-block'))
            !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            {{ Html::linkRoute('posts.index', 'All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
