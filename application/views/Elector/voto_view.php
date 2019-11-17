<!doctype html>
<html lang="en">
<title>Votaciones</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/behaviour/footer.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <!-- PARTE IZQUIERDA DEL MENU -->
       <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="navbar-brand" href="#">VotUCA</a>
            </li>
            <li>
              <a class="nav-link" href="<?= base_url().'Elector_controller/'?>">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
      </div>
        <!-- PARTE DERECHA DEL MENU -->
      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'login_controller/logout'?>">Cerrar sesión</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
        <main role="main" class="container">
          <div class="jumbotron">
            <center><h1>Elector</h1></center>
          </div>
        </main>
      <div class = "container"></div>
    </div>

    <div class="container">
      <center><h2> <?php echo $titulo ?> </h2></center>
    </div>
    <br>

    <form action="<?= base_url().'Elector_controller/guardarVoto/'.$id_votacion.'/'?>" method="post">
      <center>
        <div class="btn-group" data-toggle="buttons">
          <?php foreach($votos as $voto) { ?>
            <label class="btn btn-primary">
              <input type="radio" name="voto" autocomplete="off" value="<?php echo $voto->Nombre?>"> <?php echo $voto->Nombre ?> 
            </label>
          <?php } ?>
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="Votar">
      </center>
    </form>

</body>

  <br>
  <footer class="footer">
  <div class="container">
      <div class="row">
      <div class="col-sm-3">
          <h4 class="title">Sumi</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit, libero a molestie consectetur, sapien elit lacinia mi.</p>
          <ul class="social-icon">
          <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
          <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
          <a href="#" class="social"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
          </ul>
          </div>
      <div class="col-sm-3">
          <h4 class="title">My Account</h4>
          <span class="acount-icon">
          <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wish List</a>
          <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
          <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
          <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Language</a>
        </span>
          </div>
      <div class="col-sm-3">
          <h4 class="title">Category</h4>
          <div class="category">
          <a href="#">men</a>
          <a href="#">women</a>
          <a href="#">boy</a>
          <a href="#">girl</a>
          <a href="#">bag</a>
          <a href="#">teshart</a>
          <a href="#">top</a>
          <a href="#">shos</a>
          <a href="#">glass</a>
          <a href="#">kit</a>
          <a href="#">baby dress</a>
          <a href="#">kurti</a>
          </div>
          </div>
      <div class="col-sm-3">
          <h4 class="title">Payment Methods</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          <ul class="payment">
          <li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
          </ul>
          </div>
      </div>
      <hr>

      <div class="row text-center"> © 2019. Hecho por grupo 5 pinf.</div>
      </div>


  </footer>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>/assets/js/jquerySlim.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>

    <!-- Scripts para la tabla de votaciones -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
   <script src="<?php echo base_url()."assets/js/behaviour/tabla_secretario.js"?>"></script>

    <!-- DATE PICKER -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-datepicker.js"></script>

</html>