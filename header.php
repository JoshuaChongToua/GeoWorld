<?php 
/**
 * Fragment Header HTML page
 *
 * PHP version 7
 *
 * @category  Page_Fragment
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?><!doctype html>
<html lang="fr" class="h-100">
<head>
  <?php session_start(); ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Application Geoworld">
    <title>Homepage : GeoWorld</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/header.css" rel="stylesheet">
  <link href="css/geoworld.css" rel="stylesheet" media="screen">
  
  

<?php
  require_once 'inc/manager-db.php';
  $listeContinents = getNomContinents();
  
?>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">
</head>


<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="accueil.php"> GeoWorld</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
          
            <?php foreach($listeContinents as $cont): ?>

              <a class="dropdown-item" href="index.php?continent=<?php echo"$cont->Continent"; ?>"><?php echo"$cont->Continent"; ?></a>
              
            <?php endforeach ?>
            
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="todo-projet.php">
            Présentation-Atelier-de-Prof-SLAM
          </a>
        </li>

        <?php if($_SESSION['role']=='admin'): ?>
          <li class="nav-item">
              <a class="nav-link" href="listeUtilisateurs.php"> Liste Utilisateurs</a>
          </li>
      
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link" href="formSignup.php"> Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Log in</a>
        </li>
        
      </ul>
      
      <form method="GET" role="search" action="Recherche.php" autocomplete="off">
        <input class="form-control me-2" type="search" name="pays" placeholder="pays" aria-label="Search" >
        <div id="recherche"></div>
        <!-- <button class="btn btn-outline-success" type="submit">Search</button>  -->
      </form>
      
        
          
        </section>
    </div>
  </div>
</nav>
