<?PHP
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();

if($_GET['id']!=""){
$db = new pgDB();
$db->connect();

$res = $db->query("select notaprogetto.testo as testo,utente.id as mittente,utente.nome as nome,utente.cognome as cognome from (notaprogetto inner join utente on notaprogetto.id_creatore=utente.id) inner join partecipante on notaprogetto.id_progetto=partecipante.id_progetto where notaprogetto.id = '".$_GET['id']."' and partecipante.id_utente= '".$user->getUserId()."'");
if ($res->getNumRows() == 0)
    die ("<h1>Forbidden</h1>");
echo "<h1>Note by ".$res->first()->nome." ".$res->first()->cognome." </h1>";
echo "<p>".$res->first()->testo."</p>";
}else{
echo "<h1>Forbidden</h1>";
}
?>

