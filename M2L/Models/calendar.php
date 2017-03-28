<?php

include('../Models/connect.php');

function getFormations()
{
    global $bdd;
    $reponse = $bdd->query('SELECT id_f AS id, libelle AS title, date_d AS start, date_f AS end FROM formation');
    while($data = $reponse->fetchAll())
    {
        return $data;
    }
}

$type = $_POST['type'];

if($type == 'new')
{
    $startdate = $_POST['start'];
    $title = $_POST['title'];
    $insert = $query = $bdd->query("INSERT INTO formation(`libelle`, `date_d`, `date_f`) VALUES('$title','$startdate','$startdate')");
    $lastid = $bdd->lastInsertId();
    echo json_encode(array('status'=>'success','eventid'=>$lastid));
}

if($type == 'changetitle')
{
    $eventid = $_POST['eventid'];
    $title = $_POST['title'];
    $update = $query = $bdd->query("UPDATE formation SET libelle='$title' where id_f='$eventid'");
    if($update)
        echo json_encode(array('status'=>'success'));
    else
        echo json_encode(array('status'=>'failed'));
}

if($type == 'resetdate')
{
    $title = $_POST['title'];
    $startdate = $_POST['start'];
    $enddate = $_POST['end'];
    $eventid = $_POST['eventid'];
    $update = $query = $bdd->query("UPDATE formation SET libelle='$title', date_d= '$startdate', date_f = '$enddate' where id_f='$eventid'");
    if($update)
        echo json_encode(array('status'=>'success'));
    else
        echo json_encode(array('status'=>'failed'));
}

if($type == 'remove')
{
    $eventid = $_POST['eventid'];
    $delete = $query = $bdd->query("DELETE FROM formation where id_f='$eventid'");
    if($delete)
        echo json_encode(array('status'=>'success'));
    else
        echo json_encode(array('status'=>'failed'));
}

if($type == 'fetch')
{
    $events = array();
    $query = $bdd->query("SELECT id_f AS id, libelle AS title, date_d AS start, date_f AS end FROM formation");

    foreach($query->fetchAll() as $row)
    {
        $events [] = $row;
    }
    echo json_encode($events);
}

if($type == 'fetchuser')
{
    $id_s = $_POST['id_s'];
    $events = array();
    $query = $bdd->query("SELECT formation.id_f AS id, formation.libelle AS title, formation.date_d AS start, formation.date_f AS end, salarie.id_s, salarie.nom, salarie.prenom, suivre.etat
			from suivre, salarie, formation
			where salarie.id_s = suivre.id_s
			and formation.id_f = suivre.id_f
			and salarie.id_s ='$id_s'");

    foreach($query->fetchAll() as $row)
    {
        $events [] = $row;
    }
    echo json_encode($events);
}

if($type == 'fetchchef')
{
    $id_s = $_POST['id_s'];
    $events = array();
    $query = $bdd->query("SELECT f.id_f AS id, f.libelle AS title, f.date_d AS start, f.date_f AS end, f.contenu, f.NbJour, f.credits, f.id_a FROM formation f
            UNION
            SELECT ff.id_f AS id, ff.libelle AS title, ff.date_d AS start, ff.date_f AS end, salarie.id_s, salarie.nom, salarie.prenom, suivre.etat
			from suivre, salarie, formation ff
			where salarie.id_s = suivre.id_s
			and ff.id_f = suivre.id_f
			and salarie.id_s ='$id_s'");

    foreach($query->fetchAll() as $row)
    {
        $events [] = $row;
    }
    echo json_encode($events);
}

?>