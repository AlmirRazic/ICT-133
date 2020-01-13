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
$type = $_GET['type'];
if ($type == 'insert')
{
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Page d'insertion</title>
            <!--Liaison du fichier Stylesheet-->
            <link rel="stylesheet" type="text/css" href="../../resources/css/common.css">
        </head>

        <!--Affichage du site-->
        <body>
            <section>
                <div id="form">
                    <!--Début du formulaire-->
                    <form action="checkForm.php?type=insert" method="GET">
                        Nom
                        <input type="text" name="name"><br><br>
                        Prénom
                        <input type="text" name="lastName"><br><br>
                        Surnom
                        <input type="text" name="nickName"><br><br>
                        Description
                        <textarea name="description"></textarea><br><br>

                        <input type="radio" name="gender" value="men" checked="checked">Homme
                        <input type="radio" name="gender" value="women">Femme
                        <input type="radio" name="gender" value="other">Autre...<br><br>

                        <!--Choix de la section-->
                        Section
                        <select name="section">
                            <option value='0' selected="selected">Veuillez choisir...</option>
                            <optgroup label="------------------------"></optgroup>
                            <option value='1'>Informatique</option>
                            <option value='2'>Mécanique</option>
                            <option value='3'>Electronique</option>
                            <option value='4'>Théorie</option>
                        </select><br><br>

                        <button type="submit">Ajouter</button>
                    </form>
                </div><!--form-->
            </section>
        </body>
    </html>
    <?php
}
//Si le formulaire est ouvert en mode édition, il va chercher les informations de l'enseignant et l'afficher dans le formulaire
if ($type == 'edit')
{
    include "PDOlink.php";
    $PDO = new PDOlink();
    $teacher = $_GET['idTeacher'];
    $query = 'SELECT teaFirstname, teaLastname, teaNickname, teaOriginNickname, teaGender, idteacher, idSection FROM t_teacher WHERE idTeacher='.$teacher;
    $req = $PDO->exectueQuery($query);
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Page d'insertion</title>
            <!--Liaison du fichier Stylesheet-->
            <link rel="stylesheet" type="text/css" href="../../resources/css/common.css">
        </head>

        <!--Affichage du site-->
        <body>
            <section>
                <div id="form">
                    <!--Début du formulaire-->
                    <form action="checkForm.php?type=edit&id=<?php echo $_GET['idTeacher']?>" method="POST">
                        <?php
                            $result = $PDO->prepareData($req);
                            foreach ($result as $display)
                            {
                                echo "Nom";
                                echo "<input type='text' name='name' value='$display[teaLastname]'><br><br>";
                                echo "Prénom";
                                echo "<input type='text' name='lastName' value='$display[teaFirstname]'><br><br>";
                                echo "Surnom";
                                echo "<input type='text' name='nickName' value='$display[teaNickname]'><br><br>";
                                echo "Description";
                                echo "<textarea name='description'>$display[teaOriginNickname]</textarea><br><br>";

                                //Si l'enseignant est un homme
                                if($display['teaGender'] == "Homme")
                                {
                                    echo "<input type='radio' name='gender' value='Homme' checked='checked'>Homme";
                                    echo "<input type='radio' name='gender' value='Femme'>Femme";
                                    echo "<input type='radio' name='gender' value='Autre'>Autre...";
                                }
                                //Si l'enseignant est une femme
                                elseif($display['teaGender'] == "Femme")
                                {
                                    echo "<input type='radio' name='gender' value='Homme'>Homme";
                                    echo "<input type='radio' name='gender' value='Femme' checked='checked'>Femme";
                                    echo "<input type='radio' name='gender' value='Autre'>Autre...";
                                }
                                //Si l'enseignant n'est ni un homme, ni une femme
                                elseif($display['teaGender'] == "Autre")
                                {
                                    echo "<input type='radio' name='gender' value='Homme'>Homme";
                                    echo "<input type='radio' name='gender' value='Femme'>Femme";
                                    echo "<input type='radio' name='gender' value='Autre' checked='checked'>Autre...";
                                }
                                echo "<br><br>";

                                // Choix de la section
                                echo "Section";
                                echo "<select name='section'>";
                                echo "<option value='0'>Veuillez choisir...</option>";
                                echo "<optgroup label='------------------------'></optgroup>";

                                if ($display['idSection'] == 1)
                                {
                                    echo "<option value='1' selected='selected'>Informatique</option>";
                                    echo "<option value='2'>Mécanique</option>";
                                    echo "<option value='3'>Electronique</option>";
                                    echo "<option value='4'>Théorie</option>";
                                }
                                if ($display['idSection'] == 2)
                                {
                                    echo "<option value='1'>Informatique</option>";
                                    echo "<option value='2' selected='selected'>Mécanique</option>";
                                    echo "<option value='3'>Electronique</option>";
                                    echo "<option value='4'>Théorie</option>";
                                }
                                if ($display['idSection'] == 3)
                                {
                                    echo "<option value='1'>Informatique</option>";
                                    echo "<option value='2'>Mécanique</option>";
                                    echo "<option value='3' selected='selected'>Electronique</option>";
                                    echo "<option value='4'>Théorie</option>";
                                }
                                if ($display['idSection'] == 4)
                                {
                                    echo "<option value='1'>Informatique</option>";
                                    echo "<option value='2'>Mécanique</option>";
                                    echo "<option value='3'>Electronique</option>";
                                    echo "<option value='4' selected='selected'>Théorie</option>";
                                }
                                echo "</select><br><br>";

                                // Bouton d'envoie de la modification
                                echo "<button type='submit'>Modifier</button>";
                            }
                        ?>
                    </form>
                </div><!--form-->
            </section>
        </body>
    </html>

<!--Ajout du footer & fermeture de la conexion à la BD-->
<?php
$PDO->closeCursor($req);
$PDO->destroyObject();
}

include "include/footer.php";
?>
