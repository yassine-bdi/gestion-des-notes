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

$fnom = $_POST['fnom'];
$infoe = $_POST['infoe'];
$infoo=$_POST['infoo']; 
$enge=$_POST['enge'];
$engo=$_POST['engo'];
$syse=$_POST['syse'];
$syso=$_POST['syso'];
$ce=$_POST['ce'];
$co=$_POST['co']; 



try{
    $db = new PDO('mysql:host=localhost;dbname=gestionnotes', 'root', '');
}
catch (PDOException $e) {
    die('La connexion a échoué, Erreur = '. $e->getMessage());
}


try {
    $requete = $db->prepare("
                            UPDATE notes
                            SET infographie_ecrit='$infoe',infographie_orale='$infoe',english_ecrit='$enge',english_orale='$engo',sys_reseau_ecrit='$syse',sys_reseau_orale='$syso',
                            C_html_ecrit='$ce',C_html_orale='$co' 
                            WHERE id='$fnom'"
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
      <th><center>nom d'étudiant</center></th>
      <th>infographie ecrit</th>
        <th>infographie orale</th>
        <th>english ecrit</th>
        <th>english orale</th>
        <th>systémes et réseau ecrit</th>
        <th>systémes et réseau orale</th>
        <th>web statique et programmation procédurale ecrit</th>
        <th>web statique et programmation procédurale orale</th>
    
    </tr>
    <?php
        try {
            $requete = $db->prepare("SELECT * FROM notes WHERE id = '$fnom'");
            $requete->execute();
            $ligne = $requete->fetch(PDO::FETCH_NUM);
            echo '<tr>';
            echo "<td>$ligne[0]</td>";
            echo "<td>$ligne[1]</td>";
            echo "<td>$ligne[2]</td>";
            echo "<td>$ligne[3]</td>";
            echo "<td>$ligne[4]</td>";
            echo "<td>$ligne[5]</td>";
            echo "<td>$ligne[6]</td>";
            echo "<td>$ligne[7]</td>";
            echo "<td>$ligne[8]</td>";
            echo "<td>$ligne[9]</td>";
          

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
              alert("la note  a été modifié avec succès");
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

