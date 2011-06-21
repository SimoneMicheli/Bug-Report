<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
$user_id = $user->getUserId();
$db = new pgDB();
$db->connect();

//delete user
if($_POST['type']=="delete_user"){
    $query = "delete from partecipante where id_utente=".$_POST['id']." and id_progetto=".$_POST['project'];
    $db->query($query);

    $results = $db->query("select u.email as mail, u.id as id, p.tipo as tipo
    from partecipante as p join utente as u
        on p.id_utente = u.id
    where p.id_progetto=".$_POST['project']);
    
    foreach ($results as $user){
        if($user_id != $user->id){
?>
        <table class="note">
                <tr>
                    <td width="50%"><?php echo $user->mail ?></td>
                    <td width="40%"><?php echo$user->tipo ?></td>
                    <td width="10%"><a href="" onclick="delete_user(<?php echo $user->id ?>); return false;">Delete user</a></td>
                </tr>
            </table>
<?php
        }
    }
}

//delete categories
if($_POST['type']=="delete_category"){
     $query = "delete from categoria where nome='".$_POST['name']."' and id_progetto=".$_POST['project'];
    $db->query($query);
    
    $results = $db->query("select * from categoria where id_progetto=".$_POST['project']);
    foreach ($results as $category){
?>
            <table class="note">
                <tr>
                    <td width="90%"><?php echo $category->nome ?></td>
                    <td width="10%"><a href="" onclick="delete_category('<?php echo $category->nome ?>'); return false;">Delete category</a></td>
                </tr>
            </table>
<?php
    }
}


if($_POST['type']=="add_category"){
     $query = "insert into categoria(nome,id_progetto) values ('".$_POST['category']."','".$_POST['project']."')";
    $db->query($query);
    
    $results = $db->query("select * from categoria where id_progetto=".$_POST['project']);
    foreach ($results as $category){
?>
            <table class="note">
                <tr>
                    <td width="90%"><?php echo $category->nome ?></td>
                    <td width="10%"><a href="" onclick="delete_category('<?php echo $category->nome ?>'); return false;">Delete category</a></td>
                </tr>
            </table>
<?php
    }
}

if($_POST['type']=="update_info"){
     $query = "update progetto set nome='".$_POST['name']."', indirizzoweb='".$_POST['web']."', descrizione='".$_POST['description']."' where id='".$_POST['project']."'";
    $db->query($query);
    header("Location:./admin.php?id=".$_POST['project']);
}

if($_POST['type']=="add_user"){
    $query = "insert into partecipante(id_utente,id_progetto,tipo) values (".$_POST['user'][0].",".$_POST['project'].",'".$_POST['role']."');";
    $db->query($query);

    $results = $db->query("select u.email as mail, u.id as id, p.tipo as tipo
    from partecipante as p join utente as u
        on p.id_utente = u.id
    where p.id_progetto=".$_POST['project']);
    
    foreach ($results as $user){
        if($user_id!= $user->id){
?>
        <table class="note">
                <tr>
                    <td width="50%"><?php echo $user->mail ?></td>
                    <td width="40%"><?php echo$user->tipo ?></td>
                    <td width="10%"><a href="" onclick="delete_user(<?php echo $user->id ?>); return false;">Delete user</a></td>
                </tr>
            </table>
<?php
        }
    }
}
?>
