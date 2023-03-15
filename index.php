<?php 
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld/
 */

?>
<link href="css/infobulle.css" rel="stylesheet" media="screen">
<link href="css/index.css" rel="stylesheet" media="screen">
<?php 

require_once 'header.php'; 
if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
    echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."(".$_SESSION['role'].")";
    echo '<br><a href="./logout.php">Deconnexion</a></p>';
} else {
    $_SESSION['role']='visiteur'; 
}

?>



<?php
require_once 'inc/manager-db.php';

if (!empty($_GET['continent'])) {
    $continent = $_GET['continent'];
} else {
    $continent = 'Asia';
}


$desPays = getCountriesByContinent($continent);




?>




<main role="main" class="flex-shrink-0">

  <div class="container">
    <h1 onclick="info(this)">Les pays en <?php echo"$continent"; ?></h1>
    <div>
     <table class="table">
       <label class="haut">
         <tr>
           <th>Nom</th>
           <th>Population</th>
           <th>Capitale</th>
           <th>Langues parlées</th>

         </tr>
        </label>
       <?php
        // $desPays est un tableau dont les éléments sont des objets représentant
        // des caractéristiques d'un pays (en relation avec les colonnes de la table Country)
        ?>
        
          <?php foreach($desPays as $pays): ?>
          <tr>
              <td> <?php echo $pays->Name ?></td>
              <td> <?php echo $pays->Population ?></td>
                <?php $cap=$pays->Capital;
                $nomPays=$pays->Name;
                $langue=getLangue($nomPays);
                $capitale = getCapital($cap); 
                ?>
                <?php if(empty($capitale)) : ?>
                  <td style="color:#C6C4C4";> VIDE </td>
                <?php endif; ?>
                <?php if(!empty($capitale)) : ?>
                  <td> <?php echo $capitale[0]->Name ?></td>
                <?php endif; ?>
                

                <?php foreach($langue as $language):?>
                    <?php $first_langue= $language->Name; ?>
                    <?php break; ?>
                <?php endforeach?>
                
                <?php if(empty($langue)) : ?>
                  <td style="color:#C6C4C4";> VIDE </td>
                <?php endif;?>

                <?php if(!empty($langue)) : ?>
                <td> <span class="conteneur"><span class="objet_vise"><?php echo"$first_langue ..." ?> </span><div class="infobulle">
                    <?php foreach($langue as $language):?>
                        <?php echo "- $language->Name" ?> <br>
                    <?php endforeach?>
                </div></span> </td>

                <?php endif; ?>
                
                


                

                <?php if($_SESSION['role']=='admin') : ?>
                    
                    <td><a href="FormUpdate.php?id=<?php echo $pays->id ?>?continent=<?php echo $continent ?>">Update</a> </td>
                <?php endif; ?>

                <?php if($_SESSION['role']=='prof') : ?>
                  <td><a href="FormUpdate.php?id=<?php echo $pays->id ?>">Update</a> </td>
                <?php endif; ?>
          </tr>
                

          <?php endforeach ?>
     </table>
    </div>
    <p>
        <code>
      <?php
        
        ?>
        </code>

    </p>
    <!-- <section class="jumbotron">
      <div class="container">
        <h1 class="jumbotron-heading" onclick="info(this)">Tableau d'objets</h1>
        < <p>Le contenu ci-dessus représente une vue "debug" du premier élément d'un tableau. Ce tableau est
          constitué d'objets PHP "standard" (stdClass).</p>
        <p>Pour accéder à l'<b>attribut</b> d'un <b>objet</b> on utilisera le symbole <b><code>-></code></b>.
          Ainsi, pour accéder à l'attribut <code>Name</code> du premier pays de la liste
          <code>$desPays</code> on fera <b><code>$desPays[0]->Name</code></b>
        </p>
        <p>La variable <b><code>$desPays</code></b> référence un tableau (<i>array</i>).
          Pour générer le code HTML (table), vous devrez coder une boucle,
          par exemple de type <b><code>foreach</code></b> sur l'ensembles des objets de ce tableau. </p>
        <p>Référez-vous à la structure des tables SQL pour connaître le nom des <b><code>attributs</code></b>.
          En effet, les objets du tableau ont pour attributs les noms des colonnes de la table interrogée par un requête SQL, via l'appel à la
          fonction <b><code>getCountriesByContinent</code></b> (du script <b><code>manager-db.php</code></b>.</p>
        <p>Par exemple <b><code>Name</code></b> est une des colonnes de la table <b><code>Country</code></b> de la base de données.</p>
          <p> Bonne programmation</p>
          <div class="alert alert-warning" role="alert">
            Cette section ne s'auto-détruit pas automatiquement, ce sera à vous de le faire, une fois compris son message ! -->
          </div>
      </div>
    </section> 
  </div>
  

</main>

<script src="/PROJET/geoworld/assets/bootstrap-5.1.3-dist/js/cookiechoices.js"></script><script>document.addEventListener('DOMContentLoaded', function(event){cookieChoices.showCookieConsentBar('Ce site utilise des cookies pour vous offrir le meilleur service. En poursuivant votre navigation, vous acceptez l’utilisation des cookies.', 'J’accepte', 'En savoir plus', 'http://www.example.com/mentions-legales/');});</script>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
