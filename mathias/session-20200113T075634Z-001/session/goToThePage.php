<?php
/**
 * Created by PhpStorm.
 * User: grouxma
 * Date: 15.02.2017
 * Time: 10:30
 */
$fichier = basename($_FILES['filFileToUpload']['name']);
$taille_maxi = 1048576;
$taille = filesize($_FILES['filFileToUpload']['tmp_name']);
$extensions = array('.png', '.tif', '.jpg', '.jpeg', '.pdf');
$extension = strrchr($_FILES['filFileToUpload']['name'], '.');

//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
    $erreur = 'Vous devez uploader un fichier de type png, tif, jpg, jpeg ou pdf';
}
if($taille>$taille_maxi)
{
    $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
    //Formatage du nom du fichier
    $fichier = strtr($fichier,
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '', $fichier);
    if(move_uploaded_file($_FILES['filFileToUpload']['tmp_name'], $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
        echo "nom de l'upload : ".$_FILES['filFileToUpload']['name']."<br>";     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
        echo "type de l'upload : ".$_FILES['filFileToUpload']['type']."<br>";     //Le type du fichier. Par exemple, cela peut être « image/png ».
        echo "taille de l'upload : ".$_FILES['filFileToUpload']['size']." Ko<br>";     //La taille du fichier en octets.
        echo "upload stocké sous : ".$_FILES['filFileToUpload']['tmp_name']."<br>"; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
        echo 'Upload effectué avec succès !';
    }
    else //Sinon (la fonction renvoie FALSE).
    {
        echo 'Echec de l\'upload !';
    }
}
else
{
    echo $erreur;
}
?>