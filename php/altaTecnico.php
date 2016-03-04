<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Crear Administrador</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/login.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <br>
        <div class="page-header">
          <h2 id="titulo">Crear Tecnico</h2>
        </div>
        <form action="conexionAltaTecnico.php" method="post">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
            <label>Nombre(s):</label>
            <input type="text" class="form-control"  placeholder="&#128697; Nombre(s)" required name="nombre">
          </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
              <label>Apellido(s):</label>
              <input type="text" class="form-control"  placeholder="&#128697; Apellido(s)" required name="apellidos">
            </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
              <label>Edad:</label>
              <input type="number" class="form-control"  placeholder="&#128697; Edad" required name="edad">
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
              <label>Sexo:</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="hombre" checked>
                    Hombre
                  </label>
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="mujer" >
                    Mujer
                  </label>
                </div>
            </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email:</label>
                  <input type="email" class="form-control" placeholder="&#128272; Email" required name="email">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Password:</label>
                 <input type="Password" class="form-control"  placeholder="&#128272; Password" required name="password">
              </div>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
          </div>
        </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>