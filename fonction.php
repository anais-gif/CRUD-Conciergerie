<?php
function connect(){
try {
    $bdd = new PDO('mysql:host=localhost;dbname=maintenance', 'root','');
    return $bdd;
    }
catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

}

/////////////////////////////////////add an intervention
function add(){
    
    $add = connect()->prepare('INSERT INTO intervention (Date_intervention, Type_intervention, Etage_intervention) VALUES (:Date, :Type, :Etage)');
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


//////////////////////////////////////// edit an intervention
function edit(){

    $edit = connect()->prepare('UPDATE intervention SET Date_intervention=:editDate,Type_intervention=:editType,Etage_intervention=:editEtage WHERE id= :id');
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


////////////////////////////////////////remote an intervention 

function remote(){
   
    
    $remote = connect()->prepare('DELETE  FROM intervention WHERE id= :id');
    $remote ->bindParam(':id',$_GET['id'],
    PDO::PARAM_INT);

    $remote=$remote->execute();
    if($remote){
        echo"Vôtre enregistrement a bien été supprimer";
        }else{
            "Veuillez recommencer svp,une erreur est survenue";
    }
}

///////////////////////////////////////////////historique
function historique(){
    
    
    $etage = $_GET['etage'];
    $recup= connect()->prepare('SELECT * FROM intervention WHERE Etage_intervention = :etage');
    $recup->bindParam(':etage', $etage);
    $recup->execute();
    
    echo '<table class="table ">
    <h4 class=" text-center py-3"> HISTORIQUE ETAGE '.$etage.'</h4>
    
    <thead class="thead-dark">

        <tr>
            <th scope="col">ID </th>
            <th scope="col">ETAGE </th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">DATE</th>
            
        </tr>
    </thead>';
    
    
    
    while($donnees = $recup->fetch())
    {
    echo '<tr class=" "><td>'.$donnees['id'].'</td><td>'.$donnees['Etage_intervention'].'</td><td>'.$donnees['Type_intervention'].'</td><td>'.$donnees['Date_intervention'].'</td></tr>';
    
}
    echo'</tbody></table></div>';
    }
    
    
    
///////////////////////////////////////////////historique date
function historique_date(){
    
    
    $date = $_GET['date'];
    $recupe= connect()->prepare('SELECT * FROM intervention WHERE Date_intervention = :date');
    $recupe->bindParam(':date', $date);
    $recupe->execute();
    
    echo '<table class="table ">
    <h4 class=" text-center py-3"> HISTORIQUE PART DATE '.$date.'</h4>
    <thead class="text-center  thead-dark">
    <tr>

    <th scope="col">ID</th>
    <th scope="col">ETAGE</th>
    <th scope="col">TYPE</th>
    <th scope="col">DATE</th>
    
    </tr>
    </thead>
    <tbody>';
    
    
    
    while($donnes = $recupe->fetch())
    {
    echo '<tr class=" "><td>'.$donnes['id'].'</td><td>'.$donnes['Etage_intervention'].'</td><td>'.$donnes['Type_intervention'].'</td><td>'.$donnes['Date_intervention'].'</td></tr>';
    }
    echo'</tbody></table></div>';
    }
    
    
    
?>