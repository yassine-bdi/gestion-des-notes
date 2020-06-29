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
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fcne=$_POST['id'];
    $fnom=$_POST['mnom'];
   
    try{
        $db = new PDO('mysql:host=localhost;dbname=gestionnotes', 'root', '');
    }
    catch (PDOException $e) {
        die('La connexion a échoué, Erreur = '. $e->getMessage());
    }

    try {
            $requete = $db->prepare(
                                    "INSERT INTO modules (id,nom)
                                    VALUES ('$fcne', '$fnom')"
                                   );
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
	<table style = "width:50%;">
    <tr>
        <th colspan = "4" ><center>Ajouter un étudiant</center></th>
    </tr>
  	<tr>
    	<th><center>id de module</center></th>
    	<th><center>nom de module</center></th>
    
    </tr>
    <tr>
        <th><center><input type="text" name="id"></center></th>
        <th><center><input type="text" name="mnom"></center></th>
    </tr>
        
        <tr>
        <th colspan="2"><center><input type='submit' value ='Ajouter' class="btn btn-primary" onclick="message()"/></center></th>
        <script>
            function message() {
              alert("L'étudiant a été ajouté avec succès");
          }
        </script>
    </tr>
	</table>
    </form>
    <br><br><br><br><br><br><br><br><br>
    <a href="modules.php"><img src="Home_font_awesome.svg.png" width="100px"></a>
</center>

<?php
$db = null;
?>
</form>
</body>
</html>

