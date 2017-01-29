@extends('app')

@section('title', '| Create New Post')

@section('stylesheets')
  {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
      <hr>
      {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'data-parsely-minlength' => '5', 'data-parsley-maxlength' => '255')) }}

        {{ Form::label('slug', 'Slug:') }}
        {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'data-parsely-maxlength' => '255')) }}

        {{ Form::label('body', 'Body:') }}
        {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

        {{-- inline styling needs to moved to css --}}
        {{ Form::submit('Create Post', array('class' => 'btn btn-info btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
      {!! Form::close() !!}
    </div>
  </div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
@endsection
