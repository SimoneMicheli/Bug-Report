{include file="header.tpl"}
    <script type="text/javascript">
        $(document).ready(function(){
            $('a[rel*=facebox]').facebox() ;
        });
    </script>
    <div class="article_wrapper">
      {if $error}
      <span class="error">{$error}</span>
      {/if}
      <h2>Login</h2>
	    <form action="./execute_login.php" method="post">
		    <label>Mail:</label> <input type="text" class="enewsbox" name="mail"/>
		    <label>Password:</label> <input type="password" class="enewsbox" name="password"/>
		    <input class="button "type="submit" value="LOGIN"/>
		    <a class="button" href="./new_user.html" rel="facebox">JOIN NOW</a>
		</form>

    </div>

    <hr />
{include file="footer.tpl"}
