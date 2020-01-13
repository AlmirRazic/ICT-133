<?php
/**
 * ETML
 * Auteur: Mathias Groux
 * Date: 20.03.2017
 * Description : Affichage des informations de la BD
 */

#Liaison du Header et de la naviguation, ainsi que le fichier de connexion à la BD
include "include/header.php";
include "include/nav.php";
include "PDOlink.php";
$PDO = new PDOlink();
$query = 'SELECT teaFirstname, idteacher, idSection, teaGender, teaLastname, teaOriginNickname, teaNickname FROM t_teacher';
$req = $PDO->exectueQuery($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page d'accueil</title>
        <!--Liaison du fichier Stylesheet-->
        <link rel="stylesheet" type="text/css" href="../../resources/css/common.css">
    </head>

    <!--Affichage du site-->
    <body>
        <section>
            <table>
                <tr>
                    <!--Titres du tableau-->
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Surnom</th>
                    <th>Détails</th>
                    <th>Supprimer</th>
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
                    echo "<td><button><a href='detail.php?id=".$display['idteacher']."'>Détails</a></button></td>";
                    echo "<td><button><a href='insertForm.php?idTeacher=".$display['idteacher']."&&type=".'edit'."'>Modifier</a></button></td>";
                ?>
                <td><a onClick="return confirm('delete?')" href='delete.php?id=<?php echo $display["idteacher"]?>'>Supprimer</a><?php echo "</tr>" ?></td>
                <?php
                    }
                ?>
            </table>
        </section>
    </body>
</html>

<!--Ajout du footer-->
<?php
$PDO->closeCursor($req);
$PDO->destroyObject();
include "include/footer.php";
?>
