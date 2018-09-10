<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Origami Review</title>
  <link rel="shortcut icon" type="image/x-icon" href="/images/origami_review_logo.png" />
  <link href="{{mix('css/front.css')}}" rel="stylesheet" type="text/css">
  <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

<div id="app"></div>

<script>
  window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{mix('js/app.js')}}"></script>
<script src="{{mix('js/front.js')}}"></script>

</body>

</html>