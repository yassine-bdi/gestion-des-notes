<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=gestionnotes', 'root', '');
}
catch (PDOException $e) {// Pour afficher s'il y a une erreur
	die('La connexion a échoué, Erreur = '. $e->getMessage());
}

?>

<center>

	<b>
		ROYAUME DU MAROC<br>
		<img src="../logo.png" width="100" ><br>
		MINISTERE DE L’EDUCATION NATIONALE, DE LA FORMATION PROFESSIONNELLE, <br> DE L’ENSEIGNEMENT SUPERIEUR ET DE LA RECHERCHE SCIENTIFIQUE <br> ENS DE TETOUAN <br><br>
	</b>
	<table cellpadding="35px">
    <tr>
        <th><a href="../index.html"><img src="Home_font_awesome.svg.png" width="90px"></a></th>
        <th><a href="ajoutermodule.php"><img src="add.png" width="80px"></a></th>
        <th><a href="modifiermodule.php"><img src="edit.png" width="80p"></th>
        <th><a href="supprimermodule.php"><img src="delete-737-475058.png" width="70px"></a></th>
    </tr>
	
</table> 
	<table  class="table-striped table-hover shadow 100px 100px 100px" style = "width:50%;" border = 1 cellpadding="15px">
    <tr>
        <th colspan = "4"  ><center>Listes des modules</center></th>
    </tr>
  	<tr>
    	<th colspan=2>ID de module</th>
    	<th colspan=2>nom de module</th>
    
    </tr>
    <?php
    	try {
    		$requete = $db->prepare('SELECT * FROM modules');
    		$requete->execute();
    		while($ligne = $requete->fetch(PDO::FETCH_NUM)) {
    			echo '<tr>';
    			echo "<td colspan=2> $ligne[0] </td>";
    			echo "<td colspan=2> $ligne[1] </td>";
    		
    			echo '</tr>';
    		}
    	}
    	catch(PDOException $e) {
    		die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
    	}	
	?>
	</table> 
	
	
</center>

<?php
$db = null;
?>
</form>
</body>
</html>

