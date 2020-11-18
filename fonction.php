<?php
function db(){
try {
    $db = new PDO('mysql:host=localhost;dbname=maintenance', 'root', '');
    }
catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

}

/////////////////////////////////////add an intervention
function add(){
    if(isset($_GET['add']) && !empty($_GET['Date']) && !empty($_GET['Type']) && !empty($_GET['Etage'])){
    $add = db()->prepare('INSERT INTO intervention (Date_intervention, Type_intervention, Etage_intervention) VALUES (:Date, :Type, :Etage)');
    $add->bindParam(':Date',$_GET['Date'],
    PDO::PARAM_STR);
    $add->bindParam(':Type',$_GET['Type'],
    PDO::PARAM_STR);
    $add->bindParam(':Etage',$_GET['Etage'],
    PDO::PARAM_INT);
    $push = $add->execute();

        if($push){
            echo "Vôtre intervention à bien été enregistré !";

        }else{
            echo "Vôtre intervention n'a pas été enregistré !";
        }
}
}


//////////////////////////////////////// edit an intervention
function edit(){
if(isset($_GET['modiv']) && $_GET['modiv']=="edit" && !empty($_GET['edit_id'])
&& !empty($_GET['edit_Date']) && !empty($_GET['edit_Type']) && !empty($_GET['edit_Etage'])){
$edit = db()->prepare('UPDATE intervention SET Date_intervention=:editDate,Type_intervention=:editType,Etage_intervention=:editEtage WHERE id= :id');
$edit->bindParam(':id',$_GET['edit_id'], PDO::PARAM_STR);
$edit->bindParam(':editDate',$_GET['edit_Date'], PDO::PARAM_STR);
$edit->bindParam(':editType',$_GET['edit_Type'], PDO::PARAM_STR);
$edit->bindParam(':editEtage',$_GET['edit_Etage'], PDO::PARAM_INT);

$edit=$edit->execute();
   if($edit){
       echo "Vôtre modification a bien été pris en compte ! ";
   }else{
       echo "Vôtre modification n'a pas pu être pris en compte !";
   }
}
}

////////////////////////////////////////remote an intervention 

function remote(){
    if(isset($_GET['supp']) && $_GET['supp']=="remote"){
    $remote = db()->prepare('DELETE  FROM intervention WHERE id= :id');
    $remote ->bindParam(':id',$_GET['id'],
    PDO::PARAM_INT);

    $remote=$remote->execute();
    if($remote){
        echo"Vôtre enregistrement a bien été supprimer";
        }else{
            "Veuillez recommencer svp,une erreur est survenue";
    }
}
}
///////////////////////////////////////////////historique
// function historique(){
//     $bdd = new PDO('mysql:host=localhost;dbname=maintenance;charset=utf8', 'root', '');
//     if(isset($_GET['action']) && $_GET['action']=="historique"){
//     $etage = $_GET['etage'];
//     $recup= $bdd->prepare('SELECT * FROM intervention WHERE Etage_intervention = :etage');
//     $recup->bindParam(':etage', $etage);
//     $recup->execute();
    
//     echo '<div class="container">
//     <h4 class=" text-center py-3"> Historique Etage '.$etage.'</h4>
//     <table class="table">
//     <thead class="bg_entete_tab">
//     <tr>
    
//     <th scope="col">ETAGE</th>
//     <th scope="col">TYPE</th>
//     <th scope="col">DATE</th>
//     <from>
//     <button type="submit" value="remote" name="supp"class="btn btn-secondary" >Supprimer</button></from>
//     </tr>
//     </thead>
//     <tbody>';
    
    
    
//     while($donnees = $recup->fetch())
//     {
//     echo '<tr class=" "><td>'.$donnees['Etage_intervention'].'</td><td>'.$donnees['Type_intervention'].'</td><td>'.$donnees['Date_intervention'].'</td></tr>';
//     }
//     echo'</tbody></table></div>';
//     }
    
//     }
    
///////////////////////////////////////////////historique date
function historique_date(){
    $bdd = new PDO('mysql:host=localhost;dbname=maintenance;charset=utf8', 'root', '');
    if(isset($_GET['actionn']) && $_GET['actionn']=="historique_date"){
    $date = $_GET['date'];
    $recupe= $bdd->prepare('SELECT * FROM intervention WHERE Date_intervention = :date');
    $recupe->bindParam(':date', $date);
    $recupe->execute();
    
    echo '<div class="container">
    <h4 class=" text-center py-3"> Historique Etage '.$date.'</h4>
    <table class="table">
    <thead class="bg_entete_tab">
    <tr>
    
    <th scope="col">ETAGE</th>
    <th scope="col">TYPE</th>
    <th scope="col">DATE</th>
    </tr>
    </thead>
    <tbody>';
    
    
    
    while($donnes = $recupe->fetch())
    {
    echo '<tr class=" "><td>'.$donnes['Etage_intervention'].'</td><td>'.$donnes['Type_intervention'].'</td><td>'.$donnes['Date_intervention'].'</td></tr>';
    }
    echo'</tbody></table></div>';
    }
    
    }
    function historique(){
        $bdd = new PDO('mysql:host=localhost;dbname=maintenance;charset=utf8', 'root', '');
        if(isset($_GET['action']) && $_GET['action']=="historique"){
        $etage = $_GET['etage'];
        $recup= $bdd->prepare('SELECT * FROM intervention WHERE Etage_intervention = :etage');
        $recup->bindParam(':etage', $etage);
        $recup->execute();
        
        echo '<table class="table tablemagic">
        <h4 class=" text-center py-3"> HISTORIQUE ETAGE '.$etage.'</h4>
        <thead class="thead-dark">

            <tr>
                <th scope="col">ETAGE </th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">DATE</th>
                <th scope="col"></th>
            </tr>
        </thead>';
        
        
        
        while($donnees = $recup->fetch())
        {
        echo '<tr class=" "><td>'.$donnees['Etage_intervention'].'</td><td>'.$donnees['Type_intervention'].'</td><td>'.$donnees['Date_intervention'].'</td><td>'.'<button type="submit" value="remote" name="supp"class="btn btn-secondary" >Supprimer</button>'.'</td></tr>';
        }
        echo'</tbody></table></div>';
        }
        
        }
?>