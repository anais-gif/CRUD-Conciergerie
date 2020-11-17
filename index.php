<head>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <link rel="icon" type="image/png" href="images/1200px-Hertz-Logo.svg.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance de l'établissement </title>
</head>
<h1> Maintenace de l'établissement</h1>

<?php 
 try {
    $db = new PDO('mysql:host=localhost;dbname=maintenance', 'root', '');
    }
catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>


    <form method='GET'>
    <label for='date'>Veuillez remplire les tache effectuer</label>
        <input type="date"  name="Date" >
        <input type="text" name="Type"placeholder='Description' >
        <input type="number"  name="Etage" placeholder='Etage'>

        <button type="submit" value="add" name="add" class="btn btn-secondary">Ajouter</button>
        
    
    </form>


<?php

                                                // ADD AN INTERVENTION

    if(isset($_GET['add']) && !empty($_GET['Date']) && !empty($_GET['Type']) && !empty($_GET['Etage'])){
        $getAction = $_GET['Date'];
        $add = $db->prepare('INSERT INTO intervention (Date_intervention, Type_intervention, Etage_intervention) 
        VALUES (:Date, :Type, :Etage)');
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

   
                                                 // DISPLAY INTERVENTION 
       $query='SELECT * FROM Etage_intervention'; 
       $param=[];
       if(!empty($_['q'])){
           $query .="WHERE Date LIKE :date";
           $param['date']='%'. $_GET['q'].'%';
       }
$query .='LIMIT 20';
       $statement=$db->prepare($query);
       $statement->execute($param);
        $poo=$statement->fetchAll();
//  $req =$db->prepare('SELECT *FROM intervention');
//  $reqOk=$req->execute();
//  $task=$req->fetchAll();                                                

    ?>
<form action=''>
    <div class='form-group'>
        <input type='text' class='form-control' name='q'placeholder='recherche'>
    </div>
<button class='btn btn-primary'>RECHERCHE</button>
</form>






    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col" >DATE </th>
            <th scope="col" >TYPE</th>
            <th scope="col" >ETAGE</th>
            <th scope="col" ></th>
            <th scope="col" ></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($task as $task): ?>
        <tr>
            <th scope="col" ><?=$task['id']?></th>
            <th scope="col" ><?=$task['Date_intervention']?></th>
            <th scope="col" ><?=$task['Type_intervention']?></th>
            <th scope="col" ><?=$task['Etage_intervention']?></th>
            <!-- <th scope="col" ><button type="submit" value="supp" name="remote"class="btn btn-secondary" >Supprimer</button></th>
            <th scope="col" ><button type="submit" value="edit" name="action"class="btn btn-secondary" >Modifier</button></th>
        </tr> -->
    <?php endforeach; ?>
    </tbody>
    </table>
<?php

?>

                                                <!-- EDIT AN  INTERVENTION -->

    <form method='GET' >
    
    <label >Veuillez modifier les tache effectuer </label>
        <input type="text"  name="edit_id" placeholder='id'>
        <input type="date"  name="edit_Date">
        <input type="text"  name="edit_Type"placeholder='Description'>
        <input type="text"  name="edit_Etage"placeholder="Etage">
        <button type="submit" value="edit" name="modiv"class="btn btn-secondary" >Modifier</button>
       
        
    
    </form>

                                                 
    <?php
                                                // EDIT AN INTERVENTION *******

    if(isset($_GET['modiv']) && $_GET['modiv']=="edit" && !empty($_GET['edit_id'])
    && !empty($_GET['edit_Date']) && !empty($_GET['edit_Type']) && !empty($_GET['edit_Etage'])){

        $edit = $db->prepare('UPDATE intervention SET Date_intervention=:editDate,
         Type_intervention=:editType,Etage_intervention=:editEtage WHERE id= :id');
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
?>
<form method='GET' >
    
    <label >Veuillez supprimer les tache effectuer </label>
        <input type="text"  name="id" placeholder='id'>
        <button type="submit" value="remote" name="supp"class="btn btn-secondary" >Supprimer</button>
       
    </form>



    <?php
                                            //REMOTE AN INTERVENTION

if(isset($_GET['supp']) && $_GET['supp']=="remote"){
    $remote =$db->prepare('DELETE  FROM intervention WHERE id= :id');
    $remote ->bindParam(':id',$_GET['id'],
    PDO::PARAM_INT);

    $remote=$remote->execute();
    if($remote){
        echo"Vôtre enregistrement a bien été supprimer";
        }else{
            "Veuillez recommencer svp,une erreur est survenue";
    }
}


?>