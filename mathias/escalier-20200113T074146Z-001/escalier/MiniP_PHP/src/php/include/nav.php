<?php
/**
 * ETML
 * Auteur: Jérôme Wassenberg
 * Date: 20.03.2017
 * Description : Menus de navigation des pages du site
 */
?>

<nav>

    <ul>

        <li>
            <a href="index.php">Accueil</a>
        </li>

        <li>
            <?php
                echo "<a href='insertForm.php?type=insert'>Insertion</a>"
            ?>
        </li>

        <?php
            #Si l'utilisateur est connecté, le bouton Déconnexion apparaît à la place de Cennexion
            if (isset($_SESSION['login']))
            {
                echo '<li>';
                    echo '<a href="disconnect.php">Déconnexion</a>';
                echo '</li>';
            }
            else
            {
                echo '<li>';
                    echo '<a href="login.php">Connexion</a>';
                echo '</li>';
            }
        ?>
    </ul>
</nav>
