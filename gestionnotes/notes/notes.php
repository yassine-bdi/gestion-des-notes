<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=gestionNotes', 'root', '');
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
	<table style = "width:50%;" border = 1>
    <tr>
        <th colspan = "4" >Listes des notes</th>
    </tr>
  	<tr>
    	<th>Module</th>
    	<th>Note Ecrit </th>
    	<th>Note Orale</th>
    	
    </tr>
    <?php
    	try {
    		$requete = $db->prepare('SELECT * FROM notes');
    		$requete->execute();
    		while($ligne = $requete->fetch(PDO::FETCH_NUM)) {
    			echo '<tr>';
    			echo "<td> $ligne[0] </td>";
    			echo "<td> $ligne[1] </td>";
    			echo "<td> $ligne[2] </td>";
    			echo '</tr>';
    		}
    	}
    	catch(PDOException $e) {
    		die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
    	}	
    ?>
		<table style = "width:50%;" border = 1>
    <tr>
        <th><a href="../index.php">Accueil</a></th>
        <th><a href="ajouternotes.php">Ajouter</a></th>
        <th><a href="modifiernotes.php">Modifier</th>
        <th><a href="supprimernotes.php">Supprimer</a></th>
    </tr>
	</table> 
</center>

<?php
$db = null;
?>
</form>
</body>
</html>

