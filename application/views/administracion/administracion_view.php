<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administracion</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">VotUCA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'inicio/'?>">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Votaciones</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?= base_url().'administracion/crearVotacion'?>">Crear</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
  <div class="container">
    <main role="main" class="container">
      <div class="jumbotron">
            <center><h1>Administracion</h1></center>
      </div>
    </main><!-- /.container -->

    <?php if(isset($mensaje)): ?>
          <h2><?= $mensaje ?></h2>
      <?php endif; ?>

<div class = "container">
    <?=form_open(base_url().'administracion/prueba');?>
    <table class="table table-hover" id="tabla-votaciones">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Titulo</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Fecha Final</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
    <tbody>

      <?php
       foreach($votaciones as $votacion){?>
         <?php foreach($votacion as $objeto){?>
        <tr>
        <?php
          if ($objeto->FechaFinal <= date('Y-m-d'))
          {
             echo "<th scope=row class=table-danger>";  // Ha finalizado
          }
          else{echo "<th scope=row class=table-success>";}

        ?>
        <a href="<?= base_url().'administracion/prueba/'.$objeto->Id;?>">
         <?php echo $objeto->Id;?>
        </th>
        <td><?php echo $objeto->Titulo?></td>
        <td><?php echo $objeto->Descripcion;?></td>
        <td><?php echo $objeto->FechaInicio;?></td>
        <td><?php echo $objeto->FechaFinal;?></td>
        <td><a class="btn btn-primary" href="<?= base_url().'administracion/modificarVotacion/'.$objeto->Id;?>" role="button">Modificar</a></td>
        <td><a class="btn btn-primary" href="<?= base_url().'administracion/prueba/'.$objeto->Id;?>" role="button">Eliminar</a></td>
      </tr>
    <?php }?>
    <?php }?>
    </tbody>
    </table>
    <!-- Paginacion -->
    <div class="pagination">
    <?php echo $this->pagination->create_links(); ?>
  </div>
</nav>
</div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>/assets/js/jquerySlim.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()."assets/js/behaviour/eliminarVotacion.js"?>"></script>

    <!-- DATE PICKER -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-datepicker.js"></script>


  </body>
</html>
