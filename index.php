
<?php
include('fonction.php');
?>

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
//////////////////////////////////////////////////////////ADD AN INTERVENTION
?>
    <form method='GET'>
    <label for='date'>Veuillez remplire les tache effectuer</label>
        <input type="date"  name="Date" >
        <input type="text" name="Type"placeholder='Description' >
        <input type="number"  name="Etage" placeholder='Etage'>
        <button type="submit" value="add" name="add" class="btn btn-secondary">Ajouter</button>
        <?php add();?>
    </form>

<?php
                                                

/////////////////////////////////////////////////////END ADD AN INTERVENTION
/////////////////////////////////////////////////////EDIT AN INTERVENTION
?>
    <form method='GET' >
    <label >Veuillez modifier les tache effectuer </label>
        <input type="text"  name="edit_id" placeholder='id'>
        <input type="date"  name="edit_Date">
        <input type="text"  name="edit_Type"placeholder='Description'>
        <input type="text"  name="edit_Etage"placeholder="Etage">
        <button type="submit" value="edit" name="modiv"class="btn btn-secondary" >Modifier</button>
        <?php edit();?>
    </form>          

    <?php                                           

    
////////////////////////////////////////////////// END EDIT AN INTERVENTION
//////////////////////////////////////////////////REMOTE AN INTERVENTION
?>
<form method='GET' >
    <label >Veuillez supprimer les tache effectuer </label>
        <input type="text"  name="id" placeholder='id'>
        <button type="submit" value="remote" name="supp"class="btn btn-secondary" >Supprimer</button>
        <?php remote();?>
</form>
<?php
                                            

//////////////////////////////////////////////////////END REMOTE AN INTERVENTION
////////////////////////////////////////////////////// DISPLAY HISTORIQUE ETAGE
?>
<form method="GET">
<input type="number" name="etage" placeholder="choisir un etage">
<button type="submit" name="action" value="historique"class="btn btn-secondary">Entrer</button>
<?php historique(); ?>
</form>

<?php
////////////////////////////////////////////////////DISPLAY HISTORIQUE DATE
?>
<form method="GET">
<input type="date" name="date" placeholder="choisir une date">
<button type="submit" name="actionn" value="historique_date"class="btn btn-secondary">Entrer</button>
<?php historique_date(); ?>
</form>
