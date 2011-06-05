{include file="header.tpl"}
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
<h2>Projects</h2>
<table id="projects" class="display">
    <thead>
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>descrizione</th>
            <th>creato il</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$projects item="project"}
        <tr class="{$project->tipo}">
            <td><a href="ww.google.it">{$project->id}</a></td>
            <td><a href="ww.google.it">{$project->nome}</a></td>
            <td><a href="ww.google.it">{$project->descrizione}</a></td>
            <td><a href="ww.google.it">{$project->creatoil}</a></td>
        </tr>
        {/foreach}
    </tbody>
</table>
</div>
{include file="footer.tpl"}
