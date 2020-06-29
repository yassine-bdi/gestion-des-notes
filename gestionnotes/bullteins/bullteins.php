<!DOCTYPE html>
 <html>
   <head>
     <title>bullteins</title>
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
   //la redirection en cas d'un id erronnée 
   
   //creer une fonction qui calcule la note moyenne 
 function moy( $a, $b) {
    global $moy;
    if ($a!=NULL && $b!=NULL) {
    $moy=($a+$b)/2;
     echo $moy;
    }
    if ($b==NULL) { 
        echo $a;
    }
    
}
//creer une fonction qui donne l'appreciation
function appr($moy) {
    if ($moy  <10) {
        echo "mediocre";
    }
    if ($moy>=10 && $moy<12) {
        echo "passable"; 
    }
    if ($moy>=12 && $moy<14) {
        echo "assez bien"; 
    }
    if ($moy>=14 && $moy<16) { 
        echo "bien"; 
    }
    if ($moy>=16) { 
       echo "tres bien"; 
    }
  }
 ?> 
   <center>
   <b>
		ROYAUME DU MAROC<br>
		<img src="../logo.png" width="100" ><br>
		MINISTERE DE L’EDUCATION NATIONALE, DE LA FORMATION PROFESSIONNELLE, <br> DE L’ENSEIGNEMENT SUPERIEUR ET DE LA RECHERCHE SCIENTIFIQUE <br> ENS DE TETOUAN <br><br>
	
    nom d'étudiant : <?php echo $_POST['nom'];?><br>
    cne : <?php echo $_POST['code']; ?> <br>
    filiére : MCW 
    </b>
    <table cellpadding="15px" width="60%" class="table-striped table-hover table-dark shadow 100px 100px 100px" border="1px">
    <tr>
      <th>nom de module</th>
      <th>note d'oral</th>
      <th>note d'ecrit</th>
      <th>moyen</th>
      <th>appréciations</th>
    </tr>
    <tr>
      <td><?php $request=$bdd->prepare('SELECT nom FROM modules WHERE id=1'); $request->execute(); $call=$request->fetch(); echo $call['nom']; ?></td>
      <td><?php $info=$bdd->prepare('SELECT infographie_ecrit FROM notes WHERE nom=?'); $info->execute(array($_POST['nom'])); $call1= $info->fetch(); echo $call1['infographie_ecrit']; ?></td>
	<td><?php $info=$bdd->prepare('SELECT infographie_orale FROM notes WHERE nom=?'); $info->execute(array($_POST['nom'])); $call2= $info->fetch(); echo $call2['infographie_orale']; ?></td>
	<td><?php echo moy($call1['infographie_ecrit'],$call2['infographie_orale']);?></td>
	<td><?php echo appr($moy); ?> </td>
    </tr>
	<tr>
	<td><?php $request=$bdd->prepare('SELECT nom FROM modules WHERE id=2'); $request->execute(); $call=$request->fetch(); echo $call['nom']; ?></td>
	<td><?php $info=$bdd->prepare('SELECT english_ecrit FROM notes WHERE nom=?'); $info->execute(array($_POST['nom'])); $call3=$info->fetch(); echo $call3['english_ecrit']; ?></td>
	<td><?php $info=$bdd->prepare('SELECT english_orale FROM notes WHERE nom=?'); $info->execute(array($_POST['nom'])); $call4=$info->fetch(); echo $call4['english_orale']; ?></td>
	<td><?php echo moy($call3['english_ecrit'],$call4['english_orale']); ?> </td>
	<td><?php echo appr($moy); ?> </td>
	</tr>
	<tr>
	<td><?php $request=$bdd->prepare('SELECT nom FROM modules WHERE id=3'); $request->execute(); $call=$request->fetch(); echo $call['nom']; ?></td>
	<td><?php $info=$bdd->prepare('SELECT sys_reseau_ecrit FROM notes WHERE nom=?'); $info->execute(array($_POST['nom'])); $call5=$info->fetch(); echo $call5['sys_reseau_ecrit']; ?></td>
	<td><?php $info=$bdd->prepare('SELECT sys_reseau_orale FROM notes WHERE nom=?'); $info->execute(array($_POST['nom'])); $call6=$info->fetch(); echo $call6['sys_reseau_orale']; ?></td>
	<td><?php echo moy($call5['sys_reseau_ecrit'],$call6['sys_reseau_orale']); ?> </td>
	<td><?php echo appr($moy); ?> </td>
	</tr>
	<tr>
	<td><?php $request=$bdd->prepare('SELECT nom FROM modules WHERE id=4'); $request->execute(); $call=$request->fetch(); echo $call['nom']; ?></td>
	<td><?php $info=$bdd->prepare('SELECT C_html_ecrit FROM notes WHERE nom=?'); $info->execute(array($_POST['nom'])); $call7=$info->fetch(); echo $call7['C_html_ecrit']; ?></td>
	<td><?php $info=$bdd->prepare('SELECT C_html_orale FROM notes WHERE nom=?'); $info->execute(array($_POST['nom'])); $call8=$info->fetch(); echo $call8['C_html_orale']; ?></td>
	<td><?php echo moy($call7['C_html_ecrit'],$call8['C_html_orale']); ?> </td>
	<td> <?php echo appr($moy); ?> </td>
	</tr>
	
	<tr>
	<td><strong>moyen générale</strong></td>
	<td id="ss" colspan=3><center><?php echo $moy=($call1['infographie_ecrit']+$call2['infographie_orale']+$call3['english_ecrit']+$call4['english_orale']+$call5['sys_reseau_ecrit']+$call6['sys_reseau_orale']+$call7['C_html_ecrit']+$call8['C_html_orale'])/8; ?></td>
	
	
	<td><?php ; echo appr($moy); ?></td>
	</tr>
  </table>
  <br>
  <button value='imprimer' class="btn btn-success" onclick=window.print()>imprimer</button>
    
