<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Vue CRUD Application</title>
  <link href="{{secure_asset('css/front.css')}}" rel="stylesheet" type="text/css">
  <link href="{{secure_asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

<div id="app"></div>

<script>
  window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{secure_asset('js/app.js')}}"></script>
<script src="{{secure_asset('js/front.js')}}"></script>

</body>

</html>