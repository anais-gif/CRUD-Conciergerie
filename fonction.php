<?php
/**
 * connect
 *
 * @return void
 */
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
/**
 * add
 *
 * @return void
 */
function add(){
    //retrieve information from the intervention table
    $add = connect()->prepare('INSERT INTO intervention (Date_intervention, Type_intervention, Etage_intervention) VALUES (:Date, :Type, :Etage)');
    $add->bindParam(':Date',$_GET['Date'],
    PDO::PARAM_STR);
    $add->bindParam(':Type',$_GET['Type'],
    PDO::PARAM_STR);
    $add->bindParam(':Etage',$_GET['Etage'],
    PDO::PARAM_INT);
    //execute query
    $push = $add->execute();
    //display
        if($push){
            echo "Vôtre intervention à bien été enregistré !";

        }else{
            echo "Vôtre intervention n'a pas été enregistré !";
        }
}


//////////////////////////////////////edit an intervention
/**
 * edit
 *
 * @return void
 */
function edit(){
    //retrieve information from the intervention table
    $edit = connect()->prepare('UPDATE intervention SET Date_intervention=:editDate,Type_intervention=:editType,Etage_intervention=:editEtage WHERE id= :id');
    $edit->bindParam(':id',$_GET['edit_id'], PDO::PARAM_STR);
    $edit->bindParam(':editDate',$_GET['edit_Date'], PDO::PARAM_STR);
    $edit->bindParam(':editType',$_GET['edit_Type'], PDO::PARAM_STR);
    $edit->bindParam(':editEtage',$_GET['edit_Etage'], PDO::PARAM_INT);
    //execute query
    $edit=$edit->execute();
//display
   if($edit){
       echo "Vôtre modification a bien été pris en compte ! ";
   }else{
       echo "Vôtre modification n'a pas pu être pris en compte !";
   }
}


////////////////////////////////////////remote an intervention 
/**
 * remote
 *
 * @return void
 */
function remote(){
   //retrieve id from the intervention table
    $remote = connect()->prepare('DELETE  FROM intervention WHERE id= :id');
    $remote ->bindParam(':id',$_GET['id'],
    PDO::PARAM_INT);
//execute query
    $remote=$remote->execute();
    //display
    if($remote){
        echo"Vôtre enregistrement a bien été supprimer";
        }else{
            "Veuillez recommencer svp,une erreur est survenue";
    }
}

///////////////////////////////////////////////historique
/**
 * historique
 *
 * @return void
 */
function historique(){
    //retrieve etage-intervention from the intervention table
    $etage = $_GET['etage'];
    $recup= connect()->prepare('SELECT * FROM intervention WHERE Etage_intervention = :etage');
    $recup->bindParam(':etage', $etage);
    //execute query
    $recup->execute();
    //display
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
/**
 * historique_date
 *
 * @return void
 */
function historique_date(){
    

    // retrieve iDate_intervention from the intervention table
    $date = $_GET['date'];
    $recupe= connect()->prepare('SELECT * FROM intervention WHERE Date_intervention = :date');
    $recupe->bindParam(':date', $date);
    //execute query
    $recupe->execute();
    //display
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