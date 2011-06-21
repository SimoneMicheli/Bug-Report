<script src="./js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.elastic.source.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/FCBKcomplete/jquery.fcbkcomplete.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="./js/FCBKcomplete/style.css" type="text/css"/>
<link rel="stylesheet" href="./stylesheets/validationEngine.jquery.css" type="text/css"/>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("#new_ticket").validationEngine({promptPosition : "topRight", scroll: true}); 
    $(document).bind('close.facebox', function() { $("#new_ticket").validationEngine("hideAll"); });
    $("#new_ticket textarea").elastic();
	
});
</script>

<?php
if($_GET['id']!=""){
include_once('./libs/Smarty.class.php');
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$db = new pgDB();
$db->connect();
$user = new session();
$res = $db->query("select tipo from partecipante where id_utente = ".$user->getUserId()." and id_progetto= ".$_GET['id']);
if ($res->getNumRows() == 0)
    die ("<h1>Project forbidden</h1>");
	
Print('
		<h1>New Ticket</h1>
			<form action="execute_new_ticket.php" method="post" id="new_ticket" >
					<label>Title</label> <input type="text" class="enewsbox validate[required]" name="titolo" id="titolo" />
					<label>Description</label> <textarea name="descrizione" id="descrizione" rows="5" cols="20" class="enewsbox validate[required]"/></textarea>
					<label>Priority</label>
					<select name="priorita">
					<option value="1">Very Low</option>
					<option value="2">Low</option>
					<option selected value="3">Normal</option>
					<option value="4">High</option>
					<option value="5">Very High</option>
					</select>
					<label>Category</label>
					<select name="categoria">
');
					$res = $db->query("select nome from categoria where id_progetto= '".$_GET['id']."'");
					foreach($res as $cat){
						echo '<option value="'.$cat->nome.'">'.$cat->nome.'</option>';
					}
Print('
					</select>
					<label>Assigned to</label>
					<select name="id_assegnato">
					<option selected value="-1">--unassigned--</option>
');
					$res2 = $db->query("select utente.id as id, utente.email as email from partecipante inner join utente on partecipante.id_utente=utente.id where partecipante.id_progetto= '".$_GET['id']."'");
					foreach($res2 as $utenti){
						echo '<option value="'.$utenti->id.'">'.$utenti->email.'</option>';
					}
Print('
					</select>
					<input type="hidden" name="id" value="'.$_GET['id'].'"/>
					<input type="submit" value="Add Ticket" class="button" style="margin-top: 5px;"/>
			</form>
');
}
?>
