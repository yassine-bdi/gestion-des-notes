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

$fcne = $_POST['fcne'];
$fnom = $_POST['fnom'];


try{
    $db = new PDO('mysql:host=localhost;dbname=gestionnotes', 'root', '');
}
catch (PDOException $e) {
    die('La connexion a échoué, Erreur = '. $e->getMessage());
}


try {
    $requete = $db->prepare("
                            UPDATE modules
                            SET nom = '$fnom'
                            WHERE id='$fcne'"
                           );
    //echo "UPDATE etudiants SET nom = '$fnom', prenom = '$fprenom', age = '$fage' WHERE cne='$fcne'";
    $requete->execute();

}
catch(PDOException $e) {
            die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
}
?>
<center>
	<b>
		ROYAUME DU MAROC<br>
		<img src="../logo.png" width="100" ><br>
		MINISTERE DE L’EDUCATION NATIONALE, DE LA FORMATION PROFESSIONNELLE, <br> DE L’ENSEIGNEMENT SUPERIEUR ET DE LA RECHERCHE SCIENTIFIQUE <br> ENS DE TETOUAN <br><br>
	</b>
    <form method='POST' action='modifiermodule3.php'>
	<table style = "width:50%;" cellpadding="15px" class="table-striped table-hover shadow 100px 100px 100px" border = 1>
    <tr>
        <th colspan = "4" ><center>Modifier un module</center></th>
    </tr>
  	<tr>
    	<th colspan='2'>id de module</th>
    	<th colspan='2'>Nom de module</th>
    	
    </tr>
    <?php
        try {
            $requete = $db->prepare("SELECT * FROM modules WHERE id = '$fcne'");
            $requete->execute();
            $ligne = $requete->fetch(PDO::FETCH_NUM);
            echo '<tr>';
            echo "<td colspan='2'>$ligne[0]</td>";
            echo "<td colspan='2'>$ligne[1]</td>";
            echo '</tr>';
        }
        catch(PDOException $e) {
            die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
        }   
    ?>
    
      

	</table><br>
    <a href="modules.php"><img src="Home_font_awesome.svg.png" width="120px"></a>
        <script>
            function message() {
              alert("L'étudiant a été modifié avec succès");
          }
        </script>
    </form>
</center>

<?php
$db = null;
?>
</form>
</body>
</html>

