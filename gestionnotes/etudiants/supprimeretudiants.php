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
catch (PDOException $e) {
    die('La connexion a échoué, Erreur = '. $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rcne=$_POST['rcne'];
    try {
            $requete = $db->prepare("DELETE FROM etudiant WHERE cne='$rcne'");
            $requete->execute();
        }
        catch(PDOException $e) {
            die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
        }

}
?>
<center>
	<b>
		ROYAUME DU MAROC<br>
		<img src="../logo.png" width="100" ><br>
		MINISTERE DE L’EDUCATION NATIONALE, DE LA FORMATION PROFESSIONNELLE, <br> DE L’ENSEIGNEMENT SUPERIEUR ET DE LA RECHERCHE SCIENTIFIQUE <br> ENS DE TETOUAN <br><br>
	</b>
    <form method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
	<table style = "width:50%;" class="table-striped table-hover shadow 100px 100px 100px " cellpadding="15px" border = 1>
    <tr>
        <th colspan = "4" ><center>Supprimer un étudiant</center></th>
    </tr>
  	<tr>
    	<th>CNE</th>
    	<th>Nom</th>
    	<th>Prénom</th>
    	<th>Age</th>
    </tr>
    <?php
        try {
            $requete = $db->prepare('SELECT * FROM etudiant');
            $requete->execute();
            while($ligne = $requete->fetch(PDO::FETCH_NUM)) {
                echo '<tr>';
                echo "<td> <input type='radio' name='rcne' value='$ligne[0]'> $ligne[0] </td>";
                echo "<td> $ligne[1] </td>";
                echo "<td> $ligne[2] </td>";
                echo "<td> $ligne[3] </td>";
                echo '</tr>';
            }
        }
        catch(PDOException $e) {
            die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
        }   
    ?>
    
	</table> <br>
    <input type='submit' class="btn btn-danger" value ='Supprimer' onclick="message()"/>
        <script>
            function message() {
              alert("L'étudiant a été supprimé avec succès");
          }
        </script>
    </form>
    <br><br>
    <a href="etudiants.php"><img src="../modules/Home_font_awesome.svg.png" width="120px"></a>
</center>

<?php
$db = null;
?>
</form>
</body>
</html>

