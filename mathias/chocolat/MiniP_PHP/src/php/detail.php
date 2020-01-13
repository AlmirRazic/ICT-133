<?php
/**
 * ETML
 * Auteur: Mathias Groux
 * Date: 24.03.2017
 * Description : Affichage des infos de l'enseignant
 */

#Liaison du Header et de la naviguation, ainsi que le fichier de connexion à la BD
include "include/header.php";
include "include/nav.php";
include "PDOlink.php";

#Ouverture de la liaison à la base de données et récupération des données nécessaires
$id = $_GET['id'];
$PDO = new PDOlink();
$query = 'SELECT `idteacher`,`teaFirstname`,`teaLastname`,`teaNickname`,`teaGender`,`teaOriginNickname`, t_section.secName FROM t_teacher LEFT OUTER JOIN t_section ON t_teacher.idSection=t_section.idSection WHERE idTeacher=' . $id;
$req = $PDO->exectueQuery($query);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Page d'accueil</title>
        <!--Liaison du fichier Stylesheet-->
        <link rel="stylesheet" type="text/css" href="../../resources/css/common.css">
    </head>
    <body>
        <section>
            <!--Ouverture du tableau-->
            <table>

                <!--Affichage des titres du tableau-->
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Surnom</th>
                    <th>Origine</th>
                    <th>Sexe</th>
                    <th>Section</th>
                </tr>

                <!--Envoi de la requête et affichage des données-->
                <?php
                    $result = $PDO->prepareData($req);
                    #Affichage des données de l'enseignant
                    foreach ($result as $display)
                    {
                        echo "<tr><td>".$display['teaLastname']."</td>";
                        echo "<td>".$display['teaFirstname']."</td>";
                        echo "<td>".$display['teaNickname']."</td>";
                        echo "<td>".$display['teaOriginNickname']."</td>";
                        echo "<td>".$display['teaGender']."</td>";
                        echo "<td>".$display['secName']."</td>";
                    }
                ?>
            </table>
            <button type="button"><a href="index.php">Retour</a></button>
        </section>
    </body>
</html>

<?php
#Fermeture de la laison à la base de données
$PDO->closeCursor($req);
$PDO->destroyObject();

#Ajout du Footer
include "include/footer.php";
?>

