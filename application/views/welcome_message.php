
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>


<div class="color-line"></div>

<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
            <div class="text-center m-b-md custom-login">
                <h3>Porfavor ingrese  nombre y contraseña</h3>
                <p>Su nombre es el usuario y su id es contraseña</p>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    <form action="<?=base_url()?>Welcome/login" id="loginForm" method="post">
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" placeholder="Nombre" title="Please enter you username" required="" value="" name="user" id="username" class="form-control">

                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">

                        </div>

                        <button class="btn btn-success btn-block loginbtn" type="submit">Ingresar</button>
                        <h4 class="help-block text-center">Consultas coordicaion@redayni.org</h4>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <p>Copyright &copy;
                <script>
                    document.write( (new Date).getFullYear() )
                </script>
                Adimer paul chambi ajata
                Oruro-Bolivia
            </p>
        </div>
    </div>
</div>
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</html>
