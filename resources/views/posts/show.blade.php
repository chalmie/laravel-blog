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
          <dt>Time:</dt>
        </dl>
        <dl class="dl-horizontal">
          <dt>Updated at:</dt>
          <dt>Time:</dt>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">

          </div>
          <div class="col-sm-6">

          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
