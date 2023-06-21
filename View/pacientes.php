<?php
  session_start();
    require 'dbcon.php';
?>
<?php
if (isset($_SESSION['usuario'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/cbd3c2f268.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="preload" href="http://localhost/ecovida/css/normalize.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/normalize.css" type="text/css">
        <link rel="preload" href="http://localhost/ecovida/css/menu-principal.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/menu-principal.css" type="text/css">
        <title>Menu Principal</title>
    </head>

    <body id="body">
        <header>
            <div class="icon__menu">
                <i class="fas fa-bars" id="btn_open"></i>
                <h1>PACIENTES</h1>
            </div>
        </header>

        <div class="menu__side" id="menu_side">

            <div class="name__page">
                <img src="../img/ecovida_pequeño.png">
                <h3>Ecovida</h3>
            </div>

            <div class="name__page">
                <img src="../img/avatar.png">
                <h3><?php echo "<p>Bienvenido " . $_SESSION['usuario'] . "</p>" ?></h3>
            </div>

            <div class="options__menu">

                <a href="V_menuPrincipal.php" class="selected">
                    <div class="option">
                        <i class="fas fa-home" title="Principal"></i>
                        <h4>Principal</h4>
                    </div>
                </a>

                <a href="calendario.php">
                    <div class="option">
                        <i class="fa-solid fa-calendar" title="Calendario"></i>
                        <h4>Calendario</h4>
                    </div>
                </a>

                <a href="pacientes.php">
                    <div class="option">
                        <i class="fa-solid fa-notes-medical" title="Pacientes"></i>
                        <h4>Pacientes</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-user-doctor" title="Médico"></i>
                        <h4>Médico</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-eye-dropper" title="Estudios"></i>
                        <h4>Estudios</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="far fa-address-card" title="Resultados"></i>
                        <h4>Resultados</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-microscope" title="Examenes"></i>
                        <h4>Examenes</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-user" title="Usuario"></i>
                        <h4>Usuario</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-clock-rotate-left" title="Historial"></i>
                        <h4>Historial</h4>
                    </div>
                </a>

                <a href="../salir.php" onclick="salir(event)">
                    <div class="option" >
                        <i class="fa-solid fa-door-closed" title="Cerrar sesión"></i>
                        <h4>Cerrar sesión</h4>
                    </div>
                </a>

            </div>

        </div><!--Fin del menu lateral-->

        <main>
        <div class="tabla">
        <div class="container">
    <?php include('message.php'); ?>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4> Lista de Pacientes
              <a href="paciente_create.php" class="btn btn-success float-end"> Nuevo </a>  
            </h4>
            </div>
            <div class="card-body card2">
              <table class="table table-striped table_id " id="table_id">      
                  <thead>    
                  <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellino Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $query = "SELECT * FROM pacientes";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                      foreach($query_run as $pacientes)
                      {
                        //echo $persona['name'];
                        ?>
                        <tr>
                          <td><?=$pacientes['id'];?></td>
                          <td><?=$pacientes['name'];?></td>
                          <td><?=$pacientes['apepat'];?></td>
                          <td><?=$pacientes['apemat'];?></td>
                        
                          <td>
                          <a class="btn btn-warning" href="paciente-edit.php?id=<?= $pacientes['id']; ?>">EDITAR
                          <i class="fa fa-pencil"></i></a>
                          <form action="code.php" method="POST" class="d-inline">
                          <button type="submit" name="delete_paciente" value="<?=$pacientes['id'];?>" class="btn btn-danger btn-sm">ELIMINAR
                          <i class="fa fa-trash"></i></button>
                          </form>
                          </td>
                        </tr>
                        

                        <?php
                      }
                    }
                  else
                    {
                      echo "<h5> Algo salió mal bb </h5>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>
        </div>
        </main>

        <!--Scripts JS-->
        <script src="../js/script.js"></script>
        <script src="../js/login.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:login.php");
}
?>

<script>
$(document).ready( function() {
        $('#example2').dataTable( {
         "language": {
           "paginate": {
              "previous": "anterior",
              "next": "posterior"
            },
            "search": "Buscar:",


          },
   "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],


"searching": true,
        }

      );
      } );
</script>
