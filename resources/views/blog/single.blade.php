@extends('app')

@section('title', '| {{ $post->title }}')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <img src="{{ asset('images/' . $post->image) }}" height="400" width="800">
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->body !!}</p>
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

              {{ Form::submit('Add Comment', ['class' => 'btn btn-info pull-right', 'style' => 'margin:1em 1em;']) }}
            </div>
          </div>

        {{ Form::close() }}
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h3 class="comment-title">{{ $post->comments()->count() }} Comments <span class="glyphicon glyphicon-comment"></span></h3>
          @foreach($post->comments as $comment)
            <div class="comment">
              <div class="author-info">
                <img src={{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }} class="author-image">
                <div class="author-name">
                  <h4>{{ $comment->name }}</h4>
                  <p class="author-time">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
              </div>
              <div class="comment-content">
                {{ $comment->comment }}
              </div>
            </div>
          @endforeach
      </div>
    </div>

  </div>
@endsection
