<script src="./js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.elastic.source.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/FCBKcomplete/jquery.fcbkcomplete.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.form.js" type="text/javascript" charset="utf-8"></script>


<link rel="stylesheet" href="./js/FCBKcomplete/style.css" type="text/css"/>
<link rel="stylesheet" href="./stylesheets/validationEngine.jquery.css" type="text/css"/>

<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("#mail").validationEngine({promptPosition : "topRight", scroll: true}); 
    $(document).bind('close.facebox', function() { $("#mail").validationEngine("hideAll"); });
	$("#mail textarea").elastic();
	
	$("#mail select").fcbkcomplete({
        json_url: "users_list.php",
        addontab: false,
        maxitems: 1,
        height: 8,
        cache: true,
        filter_case: false,
        filter_selected: true,
    });
    
    $("#mail").submit(function(){
        $(".spinner",this).show();
        $(this).hide();
        $(this).ajaxSubmit({
            success: function(data){
            $("#facebox .spinner").hide();
            data = eval("("+data+")");
            $("#facebox h2").text(data.msg);
            if(data.status == 'ok')
                setTimeout(function(){
                    $(document).trigger("close.facebox");
                },2000);
            else{
                $("#mail").show().resetForm();
            }
        },
        });
        return false;
    });
});
</script>

        <h1>Send Note</h1>
                <img src="./images/ajax-loader.gif" alt="spinner" class="spinner" />
                <h2></h2>
				<form action="execute_new_user_note.php" method="post" id="mail" >
							<label>To:</label> 
							    <select class="enewsbox validate[required]" name="email" id="email">
							        <option><?php echo $_REQUEST['mail'] ; ?></option>
							    </select>
							<label>Text:</label> <textarea name="notes" id="notes" rows="5" cols="40" class="enewsbox validate[required]"/></textarea>
							<input type="submit" value="Send" class="button" style="margin-top: 5px;"/>
				</form>
