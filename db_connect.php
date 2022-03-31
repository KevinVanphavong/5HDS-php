<?php
  $server = "localhost";
  $username = "root";
  $password = "root";
  $db = "api_5HDS_gestion_stock";
  $conn = mysqli_connect($server, $username, $password, $db);

// try {
//     //On test la connexion à la base de donnée
//     $pdo = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bdd, $utilisateur, $mot_de_passe);
//     $retour['success'] = true;
//     $retour['message'] = 'Connexion validée et établie !';
// } catch (Exception $e) {
//     //Si la connexion n'est pas établie, on stop le chargement de la page.
//     $retour['success'] = false;
//     $retour['message'] = 'Echec de la connexion à la base de données';
//     exit();
// }
