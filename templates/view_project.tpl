{include file="header.tpl"}
{include file="menu.tpl"}
<link href="./stylesheets/demo_table_jui.css" type="text/css" rel="stylesheet">
<script src="./js/jquery.dataTables.js" type="text/javascript" ></script>
<link href="./stylesheets/smoothness/jquery-ui-1.8.4.custom.css" type="text/css" rel="stylesheet">
<script>
$(document).ready(function() {
	$('#tickets').dataTable({
    "bJQueryUI": true,
	"sPaginationType": "full_numbers"});
} );
</script>
<div class="article_wrapper">
      {if $error}
      <span class="error">{$error}</span>
      {/if}
<h2>Project Ticket</h2>
<table id="tickets" class="display">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$tickets item="ticket"}
        <tr>
            <td><a href="./view_ticket.php?id={$ticket->id}">{$ticket->id}</a></td>
            <td><a href="./view_ticket.php?id={$ticket->id}">{$ticket->titolo}</a></td>
            <td><a href="./view_ticket.php?id={$ticket->id}">{$ticket->priorita}</a></td>
            <td><a href="./view_ticket.php?id={$ticket->id}">{$ticket->status}</a></td>
            <td><a href="./view_ticket.php?id={$ticket->id}">{$ticket->categoria}</a></td>
        </tr>
        {/foreach}
    </tbody>
</table>
<br /><br />
</div>
