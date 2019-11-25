<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MESA ELECTORAL</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/prueba.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/circle.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/mesaElectoral.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/behaviour/footer.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

  </head>

  <body>


<br><br><br><br><br>
<div class="container">
 
    <?php
        if(isset($votaciones) && count($votaciones) == 0)
        {
          echo '<div class="alert alert-danger alert-dismissible" role="alert" id="error_alert">No hay votaciones asignadas.</div>';
        }  
        else
        {
           if(isset($mensaje) && $mensaje != '')
            {
              echo '<div class="alert alert-danger alert-dismissible" role="alert" id="error_alert">'. $mensaje .'</div>';
            }
        }
        
    ?>

<br><br>
  <div class = "container">
    <div>
    <?php
    if(isset($total)){
    echo'
      <div id="graphic-info">
      <h2>Porcentaje de voto</h2>
      </div>
        <div id="vote-info">
            <div class="c100 p'.$total/100*$censo.' big center" style="float:left;">
                <span>'.$total/100*$censo.'</span>
                <div class="slice">
                  <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
          <div id="vote-card" class="row">
              <div class="card" >
                <div class="card-header">
                  Número de votos
                </div>
                <div class="card-body">
                  <h3 class="card-text">'.$total.'</h3>
                </div>
              </div>   
              <div class="card">
                <div class="card-header">
                  Tamaño del censo
                </div>
                <div class="card-body">
                  <h3 class="card-text">'.$censo.'</h3>
                </div>
              </div>  
              <div class="card">
                <div class="card-header">
                  Información sobre el voto
                </div>
                <div class="card-body">
                  <h5 class="card-text si">'.$si.'</h5>
                  <h5 class="card-text no">'.$no.'</h5>
                  <h5 class="card-text blanco">'.$blanco.'</h5>
                </div>
              </div>      
          </div>
        </div>
    ';
    }
    ?>
    <table id="result-table" class="display table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col" class="no-sort">ID</th>
          <th scope="col">Titulo</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Fecha Final</th>
          <th scope="col"></th>
        </tr>
      </thead>
    <tbody>
      <?php
       foreach($votaciones as $objeto){?>
      <tr>
        <td scope="row" class="table-danger"><?php echo $objeto->Id;?></td>
        <td><?php echo $objeto->Titulo;?></td>
        <td><?php echo $objeto->Descripcion;?></td>
        <td><?php echo $objeto->FechaInicio;?></td>
        <td><?php echo $objeto->FechaFinal;?></td>
        <?=form_open(base_url().'MesaElectoral/recuentoVotos');?>
               <?php
               $atributos = array(
                  'recuento' => $objeto->Id

              );
               ?>
         <?= form_hidden($atributos);?>
         <td>
            <?php 
                if($objeto->FechaFinal == date('Y-m-d') || $objeto->FechaFinal < date('Y-md'))  
                  echo '<input class="btn btn-primary" type="submit" value="Recuento" name="boton_recuento">'
            ?>
        </td>
         <?= form_close(); ?>
      </tr>
    <?php }?>
    </tbody>
    </table>
  </div>

</div>
</div>




 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Scripts para la tabla de votaciones -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
   <!--<script src="<?php echo base_url()."assets/js/behaviour/tabla_secretario.js"?>"></script>-->

    <!-- DATE PICKER -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

  </body>
</html>
