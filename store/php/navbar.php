<div class="container">
  <!-- Topper w/ logo -->
  <div class="row hidden-xs topper">
    <div class="col-xs-7 col-sm-7">
      <a href="#"><img am-TopLogo alt="SECUREVIEW"  src="img/logo.png" class="img-responsive"></a>
    </div>
    <div class="col-xs-5 col-xs-offset-1 col-sm-5 col-sm-offset-0 text-right ">
      <br>
      <?php if(!isset($_SESSION["user_id"])):?>
        <?php else:?>
          <p class="alert alert-warning">Bienvenido <?php echo $_SESSION["username"];?> 
          <a type="button" class="btn btn-warning" am-latosans="bold" href="./canasta.php">Canasta</span></a>
          </p>
         
       <?php endif;?>
    </div>
  </div> <!-- End Topper -->

  <!-- Navigation -->
  <div class="row">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-xs-inline-block nav-logo" href="/"><img src="/images/logo-dark-inset.png" class="img-responsive" alt=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav js-nav-add-active-class">
            <?php if(!isset($_SESSION['"user_id"'])):?>
            <li><a href="./">Inicio</a></li>
            <?php else:?>
              <li><a href="./">Inicio</a></li>
              <li><a href="./carcarcontenido.php">Admin</a></li>
             
            <?php endif;?>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right hidden-xs">
            <?php if(!isset($_SESSION["user_id"])):?>
               <li><a href="./registroarticulo.php">Admin</a></li>
            <a type="button" class="navbar-btn btn btn-default" am-latosans="bold" href="./registro.php">Crear Cuenta</a>
            <a type="button" class="navbar-btn btn btn-default" am-latosans="bold" href="./login.php">Login</a>
            <?php else:?>
            <a type="button" class="navbar-btn btn btn-default" am-latosans="bold" href="./php/logout.php">Salir</a>  
            <?php endif;?>
          </ul>

        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
  </div>
</div>