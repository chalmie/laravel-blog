@extends('app')

@section('title', '| Edit Tag')

@section('content')

  {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}
    {{ Form::label('name', "Tag:") }}
    {{ Form::text('name', null, ['class' => 'form-control'])}}

    {{ Form::submit('Update', ['class' => 'btn btn-warning pull-right', 'style' => 'margin-top:20px;']) }}
  {{ Form::close() }}

@endsection
