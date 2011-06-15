{include file="header.tpl"}
{include file="menu.tpl"}
<link href="./stylesheets/demo_table_jui.css" type="text/css" rel="stylesheet">
<script src="./js/jquery.dataTables.js" type="text/javascript" ></script>
<link href="./stylesheets/smoothness/jquery-ui-1.8.4.custom.css" type="text/css" rel="stylesheet">
<script>
$(document).ready(function() {
	$('#projects').dataTable({
    "bJQueryUI": true,
	"sPaginationType": "full_numbers"});
} );
</script>
<div class="article_wrapper">
      {if $error}
      <span class="error">{$error}</span>
      {/if}
<h2>Projects</h2>
<table id="projects" class="display">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Role</th>
            <th>Ticket</th>
            <th>Created on</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$projects item="project"}
        <tr class="{$project->tipo}">
            <td><a href="./view_project.php?id={$project->id}">{$project->id}</a></td>
            <td><a href="./view_project.php?id={$project->id}">{$project->nome}</a></td>
            <td><a href="./view_project.php?id={$project->id}">{$project->descrizione}</a></td>
            <td><a href="./view_project.php?id={$project->id}">{$project->tipo}</a></td>
            <td><a href="./view_project.php?id={$project->id}">{$project->num_ticket}</a></td>
            <td><a href="./view_project.php?id={$project->id}">{$project->creatoil}</a></td>
        </tr>
        {/foreach}
    </tbody>
</table>
</div>
