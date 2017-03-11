@extends('app')

@section('title', '| {{ $post->title }}')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <p>Posted in: {{ $post->category->name }}</p>
      </div>
    </div>

    <div class="row">
      <div id="comment-form">

        {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              {{ Form::label('name', "Name:") }}
              {{ Form::text('name', null, ['class' => 'form-control']) }}
              {{ Form::label('email', "Email:") }}
              {{ Form::text('email', null, ['class' => 'form-control']) }}

              {{ Form::label('comment', "Comment:") }}
              {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '3']) }}

              {{ Form::submit('Add Comment', ['class' => 'btn btn-info pull-right', 'style' => 'margin-top:1em;']) }}
            </div>
          </div>

        {{ Form::close() }}
      </div>
    </div>
  </div>
@endsection
