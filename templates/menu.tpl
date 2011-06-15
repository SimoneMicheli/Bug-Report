
<div id="leftcolumn">
    <h3 class="leftbox">Menu</h3>
    <ul class="leftbox borderedlist">
	<li><a href="./" >Home</a></li>
	<li><a href="./new_project.html" rel="facebox">New Project</a></li>
	{if $project_page}
		<li><a href="./new_ticket.php" >New Ticket</a></li>
		{if $administrator}
			<li><a href="./admin.php" >Administration</a></li>
		{/if}
	{/if}
	<li><a href="./new_user_note.php" rel="facebox">Send Note</a></li>
	<li><a href="./execute_logout.php" >Logout</a></li>
    </ul>
    <hr />
  </div>
  <div id="center">