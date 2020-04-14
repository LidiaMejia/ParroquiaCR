<!DOCTYPE html>
<html lang="en" class="no-js">

<head>


    <meta charset="utf-8">
    <title>Inicio de Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/supersized.css">
    <link rel="stylesheet" href="public/css/style.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

  <form id="formLogin" action="" method="post">

    <div class="page-container">
        <h1>Inicio de Sesión</h1>

            <input type="text" name="username" class="username" placeholder="Correo Electrónico">
            <input type="password" name="password" class="password" placeholder="Contraseña">
            <div class="row">
     <button class="col-md-12 btn-primary" id="btnSend"><span class="ion-log-in"></span>&nbsp;Iniciar Sesión</button>
   </div>
   {{if showerrors}}
       <div class="alert alert-danger">
         <ul style="margin-bottom:1em !important;">
           {{foreach errors}}
             <li>
               {{this}}
             </li>
           {{endfor errors}}
         </ul>
       </div>
   {{endif showerrors}}

        </form>

    </div>

    <!-- Javascript -->
    <script src="public/js/jquery-1.8.2.min.js"></script>
    <script src="public/js/supersized.3.2.7.min.js"></script>
    <script src="public/js/supersized-init.js"></script>
    <script src="public/js/scripts.js"></script>

</body>

</html>

<script>
  $().ready(
    function(){
      $("#btnSend").click(function(e){
          e.preventDefault();
          e.stopPropagation();
          $("#formLogin").submit();
        });
    }
    );
</script>

<style>

.col-md-12{
  background-color: #c18907;
}

.password{
  background-color: white;
}

.username{
  background-color: white;
}


</style>
