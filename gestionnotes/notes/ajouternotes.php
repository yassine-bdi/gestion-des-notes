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
   <?php $bdd=new PDO('mysql:host=localhost;dbname=gestionnotes', 'root', ''); 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fmodule=$_POST['nom'];
    $fnoteecrit	=$_POST['infographie_ecrit'];
    $fnoteorale=$_POST['infographie_orale'];
    $english=$_POST['english_ecrit']; 
    $english1=$_POST['english_orale']; 
    $sys=$_POST['sys_reseau_ecrit']; 
    $sys1=$_POST['sys_reseau_orale']; 
    $html=$_POST['C_html_ecrit']; 
    $html1=$_POST['C_html_orale']; 
    try{
        $db = new PDO('mysql:host=localhost;dbname=gestionnotes', 'root', '');
    }
    catch (PDOException $e) {
        die('La connexion a �chou�, Erreur = '. $e->getMessage());
    }

    try {
            $requete = $db->prepare(
                                    "INSERT INTO notes (nom, infographie_ecrit,infographie_orale,english_ecrit,english_orale,sys_reseau_ecrit,sys_reseau_orale,C_html_ecrit,
                                    C_html_orale)
                                    VALUES ('$fmodule', '$fnoteecrit', '$fnoteorale','$english','$english1','$sys','$sys1','$html','$html1')"
                                   );
            $requete->execute();
        }
        catch(PDOException $e) {
            die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
        }

}




?><div class="shadow 100px">
<center>
	<b>
		ROYAUME DU MAROC<br>
		<img src="../logo.png" width="100" ><br>
		MINISTERE DE L�EDUCATION NATIONALE, DE LA FORMATION PROFESSIONNELLE, <br> DE L�ENSEIGNEMENT SUPERIEUR ET DE LA RECHERCHE SCIENTIFIQUE <br> ENS DE TETOUAN <br><br>
    </b>
</div>   <center> 
    <form method='post' action='<?php echo $_SERVER['PHP_SELF'];?>' autocomplete="off">
	<table style = "width:50%;" cellpadding="15px" >
    <tr>
        <th colspan = "9" ><center>Ajouter une note</center></th>
    </tr>
  	<tr>
        <th colspan=9><center>nom d'étudiant</center></th>
</tr>
<tr>
        <th colspan=9><center><input class="form-control" width="50px" type="text" name="nom"></center></th>
</tr>
    <tr>
    	<th>infographie ecrit</th>
        <th>infographie orale</th>
        <th>english ecrit</th>
        <th>english orale</th>
       
    </tr>
    <tr>
     
</tr>
    <tr>
        <th><input type="text" name="infographie_ecrit"></th>
        <th><input type="text" name="infographie_orale"></th>
        <th><input type="text" name="english_ecrit"></th>
        <th><input type="text" name="english_orale"></th>
</tr>
    <tr>
    <th>systémes et réseau ecrit</th>
        <th>systémes et réseau orale</th>
        <th>web statique et programmation procédurale ecrit</th>
        <th>web statique et programmation procédurale orale</th>
    	
    </tr>
    
    <tr>
        <th><input type="text" name="sys_reseau_ecrit"></th>
        <th><input type="text" name="sys_reseau_orale"></th>
        <th><input type="text" name="C_html_ecrit"></th>
        <th><input type="text" name="C_html_orale"></th>
    </tr>
    <tr>
      
        <th colspan="9"><center><input type='submit' class="btn btn-primary" value ='Ajouter' onclick="message()"/></center></th>
        <script>
            function message() {
              alert("La note a �t� ajout� avec succ�s");
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

