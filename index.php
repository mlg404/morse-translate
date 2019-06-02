<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Morse Translator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="inseremain.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="morse.js" charset="utf-8"></script>
</head>
<body>
  <div class="tudo">
    <form action="" method="POST">
      <div class="tudo2">
        <span>Texto</span>
        <input class="texto" type="text" name="morse" value=""/>
        <input class="morsar" type="submit" value="enviar"/>
      </div>
    </form>
    <div class="tudo2">
        <span>Última palavra inserida</span>
        <input class="texto" id="ultima" type="text" value=""/>
    </div>
  </div>
  <script type="text/javascript">
    function ultimaPalavra(){
      $.ajax({
        url: './mostrarUltima.php',
        type: 'POST',
        success:  function(data){
          $("#ultima").val(data);
        }
      });
    }
    $(".morsar").on('click', function(e){
      e.preventDefault();
      m = Object.create(MorseCode);
      morse = m.encode($("input[name='morse']").val());
      /*console.log(morse);*/
      $.ajax({
        url: './inserepalavra.php',
        type: 'POST',
        data:  {morse:morse},
        success:  function(data){
          ultimaPalavra();
          $("input[name='morse']").val("");
        }
      });
    });
    ultimaPalavra();
  </script>
</body>
</html>
