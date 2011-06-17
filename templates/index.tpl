{include file="header.tpl"}
    <div class="article_wrapper">
	  {if $notice}
      <span class="notice">{$notice}</span>
      {/if}
      {if $error}
      <span class="error">{$error}</span>
      {/if}
      <h2 align="center">Login</h2>
	    <form action="./execute_login.php" method="post">
		    <label>Mail:</label> <input type="text" class="enewsbox" name="mail"/>
		    <label>Password:</label> <input type="password" class="enewsbox" name="password"/>
		    <input class="button "type="submit" value="LOGIN"/>
		    <a class="button" href="./new_user.php" rel="facebox">JOIN NOW</a>
		</form>
    </div>
    <hr />
