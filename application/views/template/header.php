<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tienda Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="brand-sec">
                <a class="nav-link" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
            </div>
            <div class="content">
              <!-- Muestro el menu de navegación -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Consultar</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Listado</a>
                      </li>
                    </ul>
                  </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Paso la base url a variable Javascript -->
    <script type="text/javascript">
      var baseurl = "<?php echo base_url();?>";
    </script>