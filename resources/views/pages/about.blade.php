@extends('app');

@section('content')

  <div class="content">
      <div class="title m-b-md">About {{ $data["firstname"] }}</div>
        <p>Email: {{ $data["email"] }}</p>
      </div>
  </div>

@endsection
