<?php


//Connexion à la BDD exo_contacts
require_once 'init.php';

                    //    debug( $pdo ); 
                    //    debug( get_class_methods( $pdo ) ); 



// On va créer une fonction perso d'affichage de debug 
function debug( $pre ) {
    echo '<br><small class="bg-danger text-white">ceci est un print_r</small><pre class="border border-danger bg-primary text-white w-75">';
    	print_r( $pre );
    echo '</pre>';
}/*fermeture fonction debug*/

// 1er EXO afficher dans la page les données de la t_contacts PUIS afficher les données dans le TABLE
//

?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Exo Workshop - BDD Contacts</title>
  </head>
  <body>
    <div class="jumbotron container">
      <h1>Exo Workshop - BDD Contacts</h1>
      <hr>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, doloribus consequuntur necessitatibus sequi sed nesciunt reiciendis culpa facere sunt rerum? Blanditiis ut eaque cupiditate quae tempora nisi ea. Aperiam, consequuntur.</p>
    </div><!-- fin jumbotron -->


    <section class="container bg-warning">
      <div class="row">
        <div class="col-md-12">
			<p>	ici mettre le form</p>	    
        </div><!-- fin col -->
      </div><!-- fin row -->
  
      <div class="row">

	  <?php
		// $resultat = $pdo->query( " SELECT * FROM t_contacts " );

		// debug($resultat);

		// while ( $contacts = $resultat->fetch( PDO::FETCH_ASSOC ) ) { //fetch() va chercher la ligne suivante 
		// 	               debug( $contacts );
			

		// 	echo '<div class="col-md-6">';
		// 	echo '<div>' . $contacts[ 'id_contact' ] . ' : ' . $contacts[ 'prenom' ] . ' ' . $contacts[ 'nom' ] . ' - tel : ' . $contacts[ 'notes' ] . '</div>';
		// 	echo '<hr></div>';
		// }
	  ?>
        <div class="col-md-12">
			<table class="table table-sm table-dark">
			<thead>
				<tr>
				<th scope="col">id contact</th>
				<th scope="col">Prénom</th>
				<th scope="col">Nom</th>
				<th scope="col">Email</th>
				<th scope="col">Adresse</th>
				<th scope="col">Téléphone</th>
				<th scope="col">Mot de passe</th>
				<th scope="col">Notes</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<th scope="row">1</th>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
				<td>@mdo</td>
				<td>@mdo</td>
				<td>@mdo</td>
				<td>@mdo</td>
				</tr>
				<tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
				<td>@mdo</td>
				<td>@mdo</td>
				<td>@mdo</td>
				<td>@mdo</td>
				</tr>
				<tr>
				<th scope="row">3</th>
				<td colspan="2">Larry the Bird</td>
				<td>@twitter</td>
				<td>@mdo</td>
				<td>@mdo</td>
				<td>@mdo</td>
				<td>@mdo</td>
				</tr>
			</tbody>
			</table>
        </div><!-- fin col -->
      </div><!-- fin row -->
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>