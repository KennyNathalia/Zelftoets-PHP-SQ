<?php require(ROOT . "model/EmployeeModel.php");


function index()
{
    //1. Haal alle medewerkers op uit de database (via de model) en sla deze op in een variable
    $employees = getAllEmployees();
    //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    render('employee/index', $employees);
}

function create(){
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render('employee/create');
}

function store(){
    $name = $_POST["name"];
    $birth = $_POST["birth"];
    createEmployee($name, $birth);
    header("location:". URL. "employee/index");
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database

    //2. Bouw een url op en redirect hierheen

}

function edit($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $editId = $id;
    $name = $_POST["name"];
    $birth = $_POST["birth"];
    updateEmployee($name, $birth, $editId);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
    header("location:". URL. "employee/index");

}

function update($id){
    $updateId = $id;
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database
    render('employee/update', ["updateId" => $updateId]);
    //2. Bouw een url en redirect hierheen

}

function delete($id){
    $medewerkerId = $id;
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    render('employee/delete', ["medewerkerId" => $medewerkerId]);
    //2. Geef een view weer voor het verwijderen en geef de variable met medewerker hieraan mee

}

function destroy($id){
    deleteEmployee($id);
    //1. Delete een medewerker uit de database
    header("location:". URL. "employee/index");
	//2. Bouw een url en redirect hierheen
    
}
?>