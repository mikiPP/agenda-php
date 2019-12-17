<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body><h1>Agenda</h1>
<form action=""><label for="name"> Name
<input type="text" name="name" id="name">
<label for="telf">Telf
<input type="number" name="telf" id="telf">
<input type="submit" value="Submit" name="ejecutar"></form>
 <?php
 
 require_once "./Objects/Agenda.php";
 require_once './Config/database.php';

 $database = new Database();
 $db = $database->getConnection();
 $agenda = new Agenda($db);

 if (isset($_GET["ejecutar"])) {
     $nom = filter_input(INPUT_GET, "name");

     if (!$nom) {
         echo "<p>Introduce name</p>";

     } else {

         $telf = filter_input(INPUT_GET, "telf");

         if (!$telf) {
             $agenda->removeContact($nom);
         } else {
             $agenda->addNewContact($nom, $telf);
         }
     }
 }

 $agenda->printContactList();

    ?>
             </body>
</html>
