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
          <dt>Created at:</dt>
          <dt>{{ date('M j, Y h:i', strtotime($post->created_at)) }}</dt>
        </dl>
        <dl class="dl-horizontal">
          <dt>Updated at:</dt>
          <dt>{{ date('M j, Y h:i', strtotime($post->updated_at)) }}</dt>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute(
              'posts.edit',
              'Edit',
              array($post->id),
              array('class' => 'btn btn-info btn-block'))
            !!}
          </div>
          <div class="col-sm-6">
            {!! Html::linkRoute(
              'posts.destroy',
              'Delete',
              array($post->id),
              array('class' => 'btn btn-danger btn-block'))
            !!}
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
