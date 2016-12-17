@extends('app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="content">
          <div class="title m-b-md">Contact Me</div>
      </div>
    </div>
    <div class="col-md-12">
      <hr>
      <form>
        <div class="form-group">
          <label name="email">Email:</label>
          <input id="email" name="email" class="form-control">
        </div>

        <div class="form-group">
          <label name="subject">Subject:</label>
          <input id="subject" name="subject" class="form-control">
        </div>

        <div class="form-group">
          <label name="message">Message:</label>
          <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
        </div>

        <input type="submit" value="Send Message" class="btn btn-info">
      </form>
    </div>
  </div>

@endsection
