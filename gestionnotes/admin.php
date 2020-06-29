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
////Ajouter
try {
    $newcne = 5;
    $newnom = 'Youssfi';
    $newprenom = 'Morad';
    $newage = 13;

    $requete = $db->prepare( "INSERT INTO etudiants (cne, nom, prenom, age)
                              VALUES ('$newcne', '$newnom', '$newprenom', '$newage')"
                           );
    $requete->execute();
}
catch(PDOException $e) {
    die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
}

////Supprimer
// try {
//     $supcne = 5;
//     $requete = $db->prepare("DELETE FROM etudiants WHERE cne='$supcne'");
//     $requete->execute();
// }
// catch(PDOException $e) {
//     die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
// }

////Modifier
// try {
//     $modcne = 4;
//     $modnom = 'el amrani';
//     $modprenom = 'youssef';
//     $modage = 3;

//     $requete = $db->prepare("UPDATE etudiants 
//                              SET nom = '$modnom', prenom = '$modprenom', age = '$modage'
//                              WHERE cne='$modcne'"
//                            );
//     $requete->execute();
// }
// catch(PDOException $e) {
//     die('<p> Erreur['.$e->getCode().'] : '.$e->getMessage().'</p>');
// }

//Fermer la connexion
$db = null;
?>

</form>
</body>
</html>

