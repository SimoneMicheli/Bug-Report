<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
$db = new pgDB();
$db->connect();

if(!$user->isLoggedIn()){
    echo("error not logged in");
    return;
}

$text = htmlspecialchars($_POST['text'],ENT_QUOTES);
$query = "insert into notaticket(testo,id_creatore,id_ticket) VALUES ('".$text."','".$_POST['user_id']."','".$_POST['ticket_id']."');";
$db->query($query);

$results = $db->query(" select notaticket.testo as testo, notaticket.data as data, utente.email as mail
    from notaticket join utente on
        notaticket.id_creatore = utente.id
    where id_ticket=".$_POST['ticket_id']." order by data");

foreach ($results as $note){
?>
                <table class="note">
                <tr>
                    <td width="60%">From: <?php echo $note->mail; ?></td>
                    <td width="40%">Date: <?php echo $note->data; ?></td>
                </tr>
                <tr>
                    <td><?php echo $note->testo; ?></td>
                </tr>
            </table>
<?php
}
?>
