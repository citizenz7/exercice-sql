<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Exercice SQL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "exercice-sql";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
    }
    catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    ?>

<div class="container pt-3">

    <?php
      //Afficher tous les gens dont le nom est Palmer
      $sql = "SELECT first_name, last_name FROM `table 1` WHERE last_name='Palmer'";
      echo "<b>Tous les noms Palmer :</b><br>";
      echo "
      <table class='table'>
      <thead class='thead-dark'>
      <tr>
      <th scope='col'>Prénom</th>
      <th scope='col'>Nom</th>
      </tr>
      </thead>
      <tbody>
      ";

      foreach ($conn -> query($sql) as $row) {
        echo "<tr><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td></tr>";
      }

      echo "
      </tbody>
      </table>
      ";


      //Afficher toutes les femmes
      $sql = "SELECT gender, first_name, last_name FROM `table 1` WHERE gender='Female' ORDER BY last_name ASC";
      echo "<b>Toutes les femmes :</b><br>";

      echo "
      <table class='table'>
      <thead class='thead-dark'>
      <tr>
      <th scope='col'>Prénom</th>
      <th scope='col'>Nom</th>
      </tr>
      </thead>
      <tbody>
      ";

      foreach ($conn -> query($sql) as $row) {
        echo "<tr><td>" .$row["first_name"] . "</td><td>" . $row["last_name"] . "</td></tr>";
      }

      echo "
      </tbody>
      </table>
      ";


      //Tous les pays (country code) dont la lettre commence par N
      $sql = "SELECT country_code FROM `table 1` WHERE country_code LIKE 'N%'";
      echo "<b>Etats qui commencent par la lettre N :</b><br>";

      echo "
      <table class='table'>
      <thead class='thead-dark'>
      <tr>
      <th scope='col'>Etats</th>
      </tr>
      </thead>
      <tbody>
      ";

      foreach ($conn -> query($sql) as $row) {
        echo "<tr><td>" . $row["country_code"] . "</td></tr>";
      }

      echo "
      </tbody>
      </table>
      ";

      //Tous les emails qui contiennent google
      $sql = "SELECT email FROM `table 1` WHERE email LIKE '%google%'";
      echo "<b>Tous les e-mails qui contiennent Google :</b><br>";

      echo "
      <table class='table'>
      <thead class='thead-dark'>
      <tr>
      <th scope='col'>E-mail Google</th>
      </tr>
      </thead>
      <tbody>
      ";

      foreach ($conn -> query($sql) as $row) {
        echo "<tr><td>" . $row["email"] . "</td></tr>";
      }

      echo "
      </tbody>
      </table>
      ";

      //Répartition par Etat et le nombre d’enregistrement par état (croissant)


      //Insérer un utilisateur, lui mettre à jour son adresse mail, puis supprimer l’utilisateur


      //Nombre de femmes et d’hommes
      $sql = "SELECT count(*) AS hommes FROM `table 1` WHERE gender='Male'";
      echo "<b>Nombre d'hommes:</b><br>";
      foreach ($conn -> query($sql) as $row) {
        echo $row['hommes'] . "<br>";
      }
      echo "<hr>";
      $sql = "SELECT count(*) AS femmes FROM `table 1` WHERE gender='Female'";
      echo "<b>Nombre de femmes:</b><br>";
      foreach ($conn -> query($sql) as $row) {
        echo $row["femmes"] . "<br>";
      }
      echo "<hr>";

      //Afficher l'âge de chaque personne, puis la moyenne d’âge des femmes et des hommes
      $sql = "SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),'birth_date')), '%Y') + 0 AS age, first_name, last_name FROM `table 1` ORDER BY last_name ASC";
      echo "<b>Age de chaque personne:</b><br>";

      echo "
      <table class='table'>
      <thead class='thead-dark'>
      <tr>
      <th scope='col'>Prénom</th>
      <th scope='col'>Nom</th>
      <th scope='col'>Age</th>
      </tr>
      </thead>
      <tbody>
      ";

      foreach ($conn -> query($sql) as $row) {
        echo "<tr><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row['age'] . "</td></tr>";
        //echo print_r($sql);
      }

      echo "
      </tbody>
      </table>
      ";

    ?>

</div> <!-- //container -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
