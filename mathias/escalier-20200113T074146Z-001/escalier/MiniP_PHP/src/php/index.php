<?php
/**
 * ETML
 * Auteur: Jérôme Wassenberg
 * Date: 20.03.2017
 * Description : Affichage des informations de la BD
 */

#Liaison du Header et de la naviguation, ainsi que le fichier de connexion à la BD
include "include/header.php";
include "include/nav.php";
include "PDOlink.php";
$PDO = new PDOlink();
$query = 'SELECT teaFirstname, idteacher, idSection, teaGender, teaLastname, teaOriginNickname, teaNickname, teaValidate, teaIsDeleted, teaLike FROM t_teacher';
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
    <?php
    if (isset($_SESSION['login']))
    {
        ?>
        <body>
        <section>
            <table>
                <tr>
                    <!--Titres du tableau-->
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Surnom</th>
                    <th>Détails</th>

                    <!--Visible uniquement par les utilisateurs connectés-->
                    <?php
                    if ($_SESSION['login'] == 1)
                    {
                        echo "<th>Modifier</th>";
                        echo "<th>Supprimer</th>";
                    }
                    ?>
                    <th>Aimer</th>
                    <th>"J'aime"</th>
                </tr>

                <!--Envoi de la requête et affichage des données-->
                <?php
                $result = $PDO->prepareData($req);

                #Affichage des données de l'enseignant
                foreach ($result as $display)
                {
                    if ($display['teaIsDeleted'] == 0)
                    {
                        echo "<tr><td>" . $display['teaLastname'] . "</td>";
                        echo "<td>" . $display['teaFirstname'] . "</td>";
                        echo "<td>" . $display['teaNickname'] . "</td>";
                        echo "<td><button><a href='detail.php?id=" . $display['idteacher'] . "'>Détails</a></button></td>";

                        #Si l'administrateur est connecté, il peut modifier ou supprimer
                        if ($_SESSION['login'] == 1)
                        {
                            echo "<td><button><a href='insertForm.php?idTeacher=" . $display['idteacher'] . "&type=" . 'edit' . "'>Modifier</a></button></td>";
                            ?>
                            <td><a onClick='return confirm("delete?")' href='delete.php?id=<?php echo $display['idteacher'] ?>'>Supprimer</a>
                            </td>
                            <?php
                        }
                        ?>
                        <!--Affiche le bouton "j'aime" et le nombre de j'aime par enseignant-->
                        <td><button><a href='like.php?id="<?php echo $display['idteacher']?>"'>J'aime </a></button></td>
                        <td><?php if ($display['teaLike'] > 0){echo $display['teaLike'];} ?></td><?php echo "</tr>" ?>
                        <?php
                    }
                }
                ?>
            </table>
        </section>
        </body>
    <?php
    }
    ?>

</html>

<!--Ajout du footer-->
<?php
$PDO->closeCursor($req);
$PDO->destroyObject();
include "include/footer.php";
?>
