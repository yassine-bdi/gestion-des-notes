1<!DOCTYPE html>
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

$rcne = $_POST['rcne'];

try{
    $db = new PDO('mysql:host=localhost;dbname=gestionnotes', 'root', '');
}
catch (PDOException $e) {
    die('La connexion a échoué, Erreur = '. $e->getMessage());
}
?>
<center>
	<b>
		ROYAUME DU MAROC<br>
		<img src="../logo.png" width="100" ><br>
		MINISTERE DE L’EDUCATION NATIONALE, DE LA FORMATION PROFESSIONNELLE, <br> DE L’ENSEIGNEMENT SUPERIEUR ET DE LA RECHERCHE SCIENTIFIQUE <br> ENS DE TETOUAN <br><br>
	</b>
    <form method='POST' action='modifieretudiants3.php'>
	<table style = "width:50%;"cellpadding="15px" class="table-striped table-hover shadow 100px 100px 100px" border = 1>
    <tr>
        <th colspan = "4" >Modifier un étudiant</th>
    </tr>
  	<tr>
    	<th>CNE</th>
    	<th>Nom</th>
    	<th>Prénom</th>
    	<th>Age</th>
    </tr>
    <?php
        try {
            $requete = $db->prepare("SELECT * FROM etudiant WHERE id = '$rcne'");
            $requete->execute();
            $ligne = $requete->fetch(PDO::FETCH_NUM);
            echo '<tr>';
            echo "<td> <input type='text' name='fcne' value = '$rcne'> </td>";
            echo "<td> <input type='text' name='fnom' value = '$ligne[1]'> </td>";
            echo "<td> <input type='text' name='fprenom' value = '$ligne[2]'> </td>";
            echo "<td> <input type='text' name='fage' value = '$ligne[3]'> </td>";
            echo '</tr>';
        }
        catch(PDOException $e) {
            die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
        }   
    ?>
    <tr>
        <th colspan="2"><a href="etudiants.php">Listes des étudiants</a></th>
        <th colspan="2"><input type='submit' value ='Modifier' onclick="message()"/></th>
        <script>
            function message() {
              alert("L'étudiant a été modifié avec succès");
          }
        </script>
    </tr>
	</table>
    </form>
</center>

<?php
$db = null;
?>
</form>
</body>
</html>

