<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="La Re-evolución musical">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Mozcu</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('restar/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('restar/css/mozcu.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700italic,700,400italic,300italic,100italic|Roboto+Slab:400,300,100,700' rel='stylesheet' type='text/css'>


</head> 
<body>


            <div class="container col-md-12 col-lg-12">
                <!--Inicio recuperar contraseña -->
                <h2 class="form-signin-heading recuperarPassTitl text-center">Olvidaste tu contraseña </h2>
                {{-- <p class="subtreestablecerPass text-center">Mozcu enviará las instrucciones sobre cómo reestablecer tu contraseña a la dirección de correo electrónico asociada a tu cuenta. </p>        --}}
            
                <form class="form-signin panel center-block " role="form">
                    <h4 class="form-signin-heading siginsubTitl text-center">Por favor, escribe tu email </h4>
                    <input type="email" class="form-control" placeholder="Correo electrónico" required autofocus>
                    <button class="btn btn-lg btn-primary btn-block btnRecPass" type="submit">Recuperar contraseña</button>
                    
                </form>
                <!--Fin recuperar contraseña -->
            
            </div>
          
                
        
            
    

</body>
</html>