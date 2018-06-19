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
{{--<form id="form">--}}
{{--<div>--}}
{{--<label for="input1">Critere 1</label>--}}
{{--<input id="input1" type="number">--}}
{{--</div>--}}
{{--<div>--}}
{{--<label for="input2">Critere 2</label>--}}
{{--<input id="input2" type="number">--}}
{{--</div>--}}
{{--<div>--}}
{{--<label for="input3">Critere 3</label>--}}
{{--<input id="input3" type="number">--}}
{{--</div>--}}
{{--<div>--}}
{{--<label for="input4">Commentaire</label>--}}
{{--<textarea id="input4"></textarea>--}}
{{--</div>--}}
{{--<div>--}}
{{--<button type="submit">Envoyer</button>--}}
{{--</div>--}}
{{--</form>--}}
{{--</body>--}}
{{--</html>--}}

<script>
  // if (typeof web3 !== 'undefined') {
  //   web3 = new Web3(web3.currentProvider);
  // } else {
  // set the provider you want from Web3.providers
  // web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
  // web3 = new Web3(new Web3.providers.HttpProvider("https://ropsten.infura.io"));

  // }

  // $(document).ready(function() {
  //
  //   $("#form").submit(function(e) {
  //     e.preventDefault();
  //
      let params = JSON.stringify({
        critere1: $("#input1").val(),
        critere2: $("#input2").val(),
        critere3: $("#input3").val(),
        commentaire: $("#input4").val(),
      });

      let sha3_params = web3.sha3(params);

      web3.eth.sign(web3.eth.accounts[0], sha3_params, function (err, result) {
        if (err) return console.error(err);
        console.log('SIGNED:' + result)

        $.ajax({
          method: 'POST',
          url: '/reviews',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            data: params,
            hash: sha3_params,
            signed_hash: result,
            wallet: web3.eth.accounts[0]
          },
          success: function(data) {
            alert("ok : " + data['response']);
          },
          fail: function(data) {
            alert('ko : ' + data.data);
          }
        })
  //
  //
  //     })
  //
  //   });
  //
  // });
</script>
