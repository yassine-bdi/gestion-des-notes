<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=gestionNotes', 'root', '');
}
catch (PDOException $e) {
    die('La connexion a échoué, Erreur = '. $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rmodule=$_POST['rmodule'];
    try {
            $requete = $db->prepare("DELETE FROM notes WHERE module='$rmodule'");
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
	<table style = "width:50%;" border = 1>
    <tr>
        <th colspan = "4" >Supprimer une note</th>
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
                echo "<td> <input type='radio' name='rmodule' value='$ligne[0]'> $ligne[0] </td>";
                echo "<td> $ligne[1] </td>";
                echo "<td> $ligne[2] </td>";
                echo '</tr>';
            }
        }
        catch(PDOException $e) {
            die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
        }   
    ?>
    <tr>
        <th colspan="2"><a href="notes.php">Listes des notes</a></th>
        <th colspan="2"><input type='submit' value ='Supprimer' onclick="message()"/></th>
        <script>
            function message() {
              alert("La note a été supprimé avec succès");
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

