<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Vue CRUD Application</title>
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="/img/origami_review_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Origami Review
  </a>
</nav>

<div id="app">
</div>
<script>
  window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>