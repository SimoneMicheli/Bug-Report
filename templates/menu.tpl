
<div id="leftcolumn">
    <h3 class="leftbox">Menu</h3>
    <ul class="leftbox borderedlist">
	<li><a href="./" >My Projects</a></li>
	<li><a href="./me.php" >My Tickets</a></li>
	<li><a href="./new_project.php" rel="facebox">New Project</a></li>
	
	{if $project_page}
		<li><a href="./new_ticket.php?id={$id}" rel="facebox">New Ticket</a></li>
		<li><a href="./new_project_note.php?id={$id}" rel="facebox">New Project Note</a></li>
	{/if}
	
	<li><a href="./new_user_note.php" rel="facebox">New User Note</a></li>
	{if ($administrator && $project_page)}
		<li><a href="./admin.php?id={$id}">Administration</a></li>
	{/if}
	
	{if ($administrator && $ticket_page )}
	    <li><a href="./delete_ticket.php?id={$ticket_id}">Delete Ticket</a></li>
	{/if}
	<li><a href="./execute_logout.php">Logout</a></li>
    </ul>
    <hr />
  </div>
  <div id="center">
