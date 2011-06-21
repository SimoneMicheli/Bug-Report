{include file="header.tpl"}
{include file="menu.tpl"}

<script src="./js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.elastic.source.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/FCBKcomplete/jquery.fcbkcomplete.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="./js/FCBKcomplete/style.css" type="text/css"/>
<link rel="stylesheet" href="./stylesheets/validationEngine.jquery.css" type="text/css"/>

<script>
    $(document).ready(function(){
        $("#textarea").elastic(); 
        $("#edit_project").validationEngine({
            promptPosition : "topRight", 
            scroll: true
        }); 
        
        $("#user").fcbkcomplete({
            json_url: "users_list.php",
            addontab: false,
            maxitems: 1,
            height: 8,
            cache: true,
            filter_case: false,
            filter_selected: true,
        });
        
        $("#open_more_user").click(function(){
            $.facebox({
                div: "#more_user"
            });
        });
    });
    
    function delete_category(name){
        if (!confirm("Do you really want to delete this caregory and all related tickets?"))
            return ;
        $.post("./execute_project_info.php",{
            name: name,
            project: {$project_id},
            type: "delete_category"
        },function(data){
            $("#categories").html(data);
        });
    }
    
    function delete_user(id){
        if (!confirm("Do you really want to delete this user?"))
            return ;
        $.post("./execute_project_info.php",{
            id: id,
            project: {$project_id},
            type: "delete_user"
        },function(data){
            $("#users").html(data);
        });
    }
</script>

<form action="execute_project_info.php" method="POST" id="edit_project">
    <input type="hidden" name="type"  value="update_info" />
    <input type="hidden" name="project" value="{$project_id}" />
    <label>Project name</label>
    <input type="text" class="enewsbox validate[required]" id="name" name="name" value="{$name}" />
    <label>Project description</label>
    <textarea class="enewsbox validate[required]" name="description" id="description">{$description}</textarea>
    <label>Project web page</label>
    <input type="text" class="enewsbox" name="web" value="{$web}" />
    <input type="submit" class="button" value="Update project info" />
</form>

    <h3>cateories</h3>
    <div id="categories">
    {foreach from=$categories item="category"}
            <table class="note">
                <tr>
                    <td width="90%">{$category->nome}</td>
                    <td width="10%"><a href="" onclick="delete_category('{$category->nome}'); return false;">Delete category</a></td>
                </tr>
            </table>
    {/foreach}
    </div>
    <input type="button" value="add more category" id="more_category" class="button"/>
    
    <h3>Users</h3>
    <div id="users">
    {foreach from=$users item="user"}
        {if $user_id neq $user->id}
            <table class="note">
                <tr>
                    <td width="50%">{$user->mail}</td>
                    <td width="40%">{$user->tipo}</td>
                    <td width="10%"><a href="" onclick="delete_user({$user->id}); return false;">Delete user</a></td>
                </tr>
            </table>
        {/if}
    {/foreach}
    </div>
    <input type="button" value="add more user" id="open_more_user" class="button"/>

<div id="more_user" style="display: none">
<form action="./execute_project_info.php" method="POST" class="more_user">
    <label>User email</label>
    <select id="user" name="user"></select>
    <label>Role</label>
    <select name="role">
        <option selected value="notifier">notifier</option>
        <option value="developer">developer</option>
        <option value="administrator">administrator</option>
    </select>
    <input type="hidden" name="project" value="{$project_id}"/>
    <input type="hidden" name="type" value="add_user"/>
    <input type="submit">
</form>
</div>
<br />

<div id="more_category" style="display: none">
<form action="./execute_project_info.php" method="POST" class="more_user">
    <label>Category name</label>
    <input type="text" name="category" value=""/>
    <input type="hidden" name="project" value="{$project_id}"/>
    <input type="hidden" name="type" value="add_category"/>
    <input type="submit" value="Add category">
</form>
</div>

<div id="edit_role">
<form id="edit_role" style="width:100%" action="execute_edit_user.php" method="post" >
        <select name="user">
        {foreach from=$users item="user"}
            {if $user_id neq $user->id}
                <option value="{$user->id}">{$user->mail} ({$user->tipo})</option>;
            {/if}
        {/foreach}
        </select>
        edit in
        <select name="type">
        <option selected value="notifier">notifier</option>
        <option value="developer">developer</option>
        <option value="administrator">administrator</option>
        </select>
		<input type="hidden" name="id" value="{$project_id}"/>
		<input type="submit" value="Edit user" class="button" style="margin-top: 5px;"/>
</form>
</div>
