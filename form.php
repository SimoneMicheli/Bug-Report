
<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
if($_GET['id']!=""){
$db = new pgDB();
$db->connect();

if ($_GET['id'] == "")
    die ("<h1>Invalid Project ID</h1>");
	
Print('
			<form action="execute_edit_user.php" method="post" >
					<select name="user">
');
					$res = $db->query("select utente.email as email,utente.id as id,partecipante.tipo as tipo from partecipante join utente on partecipante.id_utente=utente.id where id_progetto= '".$_GET['id']."' order by email");
					foreach($res as $cat){
						echo '<option value="'.$cat->id.'"><b>'.$cat->email.' </b>('.$cat->tipo.')</option>';
					}
Print('
					</select>
					edit in
					<select name="type">
					<option selected value="notifier">notifier</option>
					<option value="developper">developer</option>
					<option value="administrator">administrator</option>
					</select>
					<br />
					<input type="hidden" name="id" value="'.$_GET['id'].'"/>
					<input type="submit" value="Edit user" class="button" style="margin-top: 5px;"/>
			</form>
');
}
?>
