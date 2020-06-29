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
    $fcne=$_POST['fcne'];
    $fnom=$_POST['fnom'];
    $fprenom=$_POST['fprenom'];
    $fage=$_POST['fage'];
    try{
        $db = new PDO('mysql:host=localhost;dbname=gestionnotes', 'root', '');
    }
    catch (PDOException $e) {
        die('La connexion a échoué, Erreur = '. $e->getMessage());
    }

    try {
            $requete = $db->prepare(
                                    "INSERT INTO etudiant (id, nom, prenom, age)
                                    VALUES ('$fcne', '$fnom', '$fprenom', '$fage')"
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
	<table style = "width:50%;" class="table-striped table-hover shadow 100px 100px 100px" cellpadding="15px" border = 1>
    <tr>
        <th colspan = "4" > <center>Ajouter un étudiant</center></th>
    </tr>
  	<tr>
    	<th>CNE</th>
    	<th>Nom</th>
    	<th>Prénom</th>
    	<th>Age</th>
    </tr>
    <tr>
        <th><input type="text" name="fcne"></th>
        <th><input type="text" name="fnom"></th>
        <th><input type="text" name="fprenom"></th>
        <th><input type="text" name="fage"></th>
    </tr>
    </table>
      <br>
       
        <center><input type='submit' class="btn btn-primary" value ='Ajouter' onclick="message()"/></center>
        <script>
            function message() {
              alert("L'étudiant a été ajouté avec succès");
          }
        </script>

	
<br><br><br>
    <a href="etudiants.php"><img src="../modules/Home_font_awesome.svg.png" width="120px"></a>
    </form>

</center>

<?php
$db = null;
?>
</form>
</body>
</html>

