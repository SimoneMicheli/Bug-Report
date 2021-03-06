<script src="./js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.elastic.source.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/FCBKcomplete/jquery.fcbkcomplete.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="./js/FCBKcomplete/style.css" type="text/css"/>
<link rel="stylesheet" href="./stylesheets/validationEngine.jquery.css" type="text/css"/>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("#new_project").validationEngine({promptPosition : "topRight", scroll: true}); 
    $(document).bind('close.facebox', function() { $("#new_project").validationEngine("hideAll"); });
    $("#new_project textarea").elastic();
    
    $("#new_project select").fcbkcomplete({
        json_url: "users_list.php",
        addontab: false,
        maxitems: 10,
        height: 8,
        cache: true,
        filter_case: false,
        filter_selected: true,
    });
});
</script>
        <h1>New Project</h1>
			<form action="execute_new_project.php" method="post" id="new_project" >
					<label>Project Name</label> <input type="text" class="enewsbox validate[required]" name="name" id="name" />
					<label>Description</label> <textarea name="description" id="description" rows="5" cols="20" class="enewsbox validate[required]"/></textarea>
					<p style="text-decoration:underline;font-weight:bold">Invite other users:</p>
						<label>Notifier:</label>
						<select name="notifier" id="notifier" >
						</select>
						<label>Developer:</label>
						<select name="developer" id="developer"/>
						</select>
						<label>Administrator:</label>
						<select name="administrator" id="administrator"/>
						</select>
					<p style="text-decoration:underline;font-weight:bold">Categories: (comma separated)</p>
					<input type="text" class="enewsbox validate[required]" name="category" id="category" />
					<p style="text-decoration:underline;font-weight:bold">Optional fields:</p>
					<label>Web Address</label> <input type="text" id="webaddress" name="webaddress" class="enewsbox"/>
					<label>Notes</label> <textarea name="notes" id="notes" rows="5" cols="20" class="enewsbox"/></textarea>
					<input type="submit" value="Add Project" class="button" style="margin-top: 5px;"/>
			</form>
