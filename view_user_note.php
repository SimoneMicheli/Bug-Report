<?PHP
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();

if($_GET['id']!=""){
$db = new pgDB();
$db->connect();
$res = $db->query("select notautente.testo as testo,utente.id as mittente,utente.nome as nome,utente.cognome as cognome,utente.email as email from notautente inner join utente on notautente.id_creatore=utente.id where notautente.id = '".$_GET['id']."' and id_destinatario= '".$user->getUserId()."'");
if ($res->getNumRows() == 0)
    die ("<h1>Forbidden</h1>");//non va rel facebox
echo "<h1>Note by ".$res->first()->nome." ".$res->first()->cognome." </h1>(".$res->first()->email.")";
echo "<p>".$res->first()->testo."</p>";
}else{
echo "<h1>Forbidden</h1>";
}
?>
