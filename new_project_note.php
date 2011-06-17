<script src="./js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.elastic.source.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/FCBKcomplete/jquery.fcbkcomplete.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.form.js" type="text/javascript" charset="utf-8"></script>


<link rel="stylesheet" href="./js/FCBKcomplete/style.css" type="text/css"/>
<link rel="stylesheet" href="./stylesheets/validationEngine.jquery.css" type="text/css"/>

<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("#project_note").validationEngine({promptPosition : "topRight", scroll: true}); 
    $(document).bind('close.facebox', function() { $("#project_note").validationEngine("hideAll"); });
	$("#project_note textarea").elastic();
	
});
</script>

        <h1>Write project note</h1>
                <img src="./images/ajax-loader.gif" alt="spinner" class="spinner" />
                <h2></h2>
				<form action="execute_new_project_note.php" method="post" id="project_note" >
							<?PHP
							echo '<input type="hidden" name="id" value="'.$_REQUEST['id'].'"/>';
							?>
							<textarea name="notes" id="notes" rows="5" cols="40" class="enewsbox validate[required]"/></textarea>
							<input type="submit" value="Send" class="button" style="margin-top: 5px;"/>
				</form>
