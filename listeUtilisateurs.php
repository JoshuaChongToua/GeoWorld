<html>
  <head>
    <link href="css/listeutils.css" rel="stylesheet" media="screen">
  </head>

  <body class="util">
      <?php
       /** 
        * On se connecte à la base Adherent
        
        * Ce script est composé de fonctions d'exploitation des données
        * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
        *
        * C'est le seul endroit dans l'application où a lieu la communication entre
        * la logique métier de l'application et les données en base de données, que
        * ce soit en lecture ou en écriture.
        *
        * PHP version 7
        *
        * @category  Database_Access_Function
        * @package   Application
        * @author    SIO-SLAM <sio@ldv-melun.org>
        * @copyright 2019-2023 SIO-SLAM
        * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
        * @link      https://github.com/sio-melun/geoworld
        */

        /**
         *  Les fonctions dépendent d'une connection à la base de données,
         *  cette fonction est déportée dans un autre script.
         */
        
        require_once "inc/connect-db.php";
        require_once "inc/manager-db.php";
        require_once "header.php";
        
        

        $listeUtil = getAllUtil();
         // Create connection
        
      if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
          echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."(".$_SESSION['role'].")";
          echo '<br><a href="./logout.php">Deconnexion</a></p>';
      } else {
          $_SESSION['role']='visiteur';
      }
        ?>


        


        <table border=2>
          <tr>
              <th>id</th>
              <th>nom</th>
              <th>prenom</th>
              <th>login</th>
              <th>role</th>
              <th>update</th>
              <th>delete</th>
          </tr>

          <?php
            $requete = "SELECT * FROM identification";
            $result=$pdo->query($requete);
            ?>

        
          <?php foreach($listeUtil as $util):?>
            <tr>
              <td><?php echo $util->id;?> </td>
              <td><?php echo $util->nom; ?> </td>
              <td><?php echo $util->prenom;?></td>
              <td><?php echo $util->login;?> </td>
              
                  <?php if($util->role=="visiteur") : ?>
                <td style="color:red"><?php echo $util->role;?> </td>
              
              <?php else: ?>
              <td><?php echo $util->role;?> </td>
              <?php endif; ?>
              
              <td><a href="FormUpdateUtil.php?id=<?php echo $util->id ?>">Update</a> </td>
                
              
              <td><a href="delete.php?id=<?php echo $util->id ?>">Delete</a> </td>
                
            </tr>
          <?php endforeach; ?>
        </table>

        <div class="ajouter-btn-container">
          <button class="ajouter-btn" onclick="location.href='formSQL.php'">Ajouter</button>
        </div>
              

       <?php 
        require_once 'javascripts.php';

        ?>
        </body>
        

      </html>