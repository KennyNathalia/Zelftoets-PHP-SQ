<?php


function getAllEmployees(){
  // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
  // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
  // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
   try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();
   
       // Zet de query klaar door middel van de prepare method
       $stmt = $conn->prepare("SELECT * FROM employees");

       // Voer de query uit
       $stmt->execute();

       // Haal alle resultaten op en maak deze op in een array
       // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
       // hier de fetchAll functie.
       $result = $stmt->fetchAll();

   }
   // Vang de foutmelding af
   catch(PDOException $e){
       // Zet de foutmelding op het scherm
       echo "Connection failed: " . $e->getMessage();
   }

   // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
   // van de server opgeschoond blijft
   $conn = null;

   // Geef het resultaat terug aan de controller
   return $result;
}

function getEmployee($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM employees WHERE id = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        // Voer de query uit
        $stmt->execute();

        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetch();
 
    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;
 
    // Geef het resultaat terug aan de controller
    return $result;
 }

function employees(){
        $conn = openDatabaseConnection();
        $query = $conn->prepare("SELECT * FROM employees ORDER BY birth");
        $query->execute();
        $info = $query->fetchAll();
        return $info;
}



function createEmployee($name, $birth){
        $conn = openDatabaseConnection();
        $query = $conn->prepare("INSERT INTO employees (name, birth) VALUES (:name, :birth)");
        $query->bindParam(":name", $name);
        $query->bindParam(":birth", $birth);
        $query->execute();
    // Maak hier de code om een medewerker toe te voegen

 }


 function updateEmployee($name, $birth, $id){
        $conn = openDatabaseConnection();
        $query = $conn->prepare("UPDATE employees SET name = :name, birth = :birth WHERE id = :id");
        $query->bindParam(":name", $name);
        $query->bindParam(":birth", $birth);
        $query->bindParam(":id", $id);
        $query->execute();
    // Maak hier de code om een medewerker te bewerken
 }

 function deleteEmployee($id){
        $conn = openDatabaseConnection();
        $query = $conn->prepare("DELETE FROM `employees` WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
    // Maak hier de code om een medewerker te verwijderen
 }


?>