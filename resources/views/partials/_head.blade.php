<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Welcome</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

{{ Html::style('css/styles.css') }}

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

@yield('stylesheets')

<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .btn-h1-spacing {
      margin-top: 18px;
    }

    .form-spacing-top {
      margin-top: 30px;
    }

    .comment {
      margin-bottom:45px;
    }

    .author-image {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      float: left;
    }

    .author-name {
      float: left;
      margin-left: 15px;
    }

    .author-name>h4 {
      margin: 5px 0px;
    }

    .author-time {
      font-size: 11px;
      font-style: italic;
      color: #aaa;
    }

    .comment-content {
      clear:both;
      margin-left: 65px;
      font-size: 16px;
      line-height: 1.3em;
    }

    .comment-title {
      margin-bottom: 45px;
    }

</style>
