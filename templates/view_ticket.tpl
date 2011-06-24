{include file="header.tpl"}
{include file="menu.tpl"}

<script src="./js/jquery.elastic.source.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.form.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="./stylesheets/validationEngine.jquery.css" type="text/css"/>

<script type="text/javascript">
    $(document).ready(function(){
        $("textarea").elastic();

        $("#new_note").submit(function(){
            var validate = $(this).validationEngine("validate",{
                promptPosition: "topRight"
            });
            if(!validate)
                return false;
            $(this).ajaxSubmit({
                success: function(data){
                    $("#notes").html(data);
                    $("#new_note").resetForm();
                }
            });
            return false;
        });
    });
</script>

<div class="article_wrapper">
<h2>Ticket: {$ticket->titolo} </h2> 
    <table id="ticket_description" cellpadding="0" cellspacing="0">
        <tr>
            <td width="50%">Id: {$ticket->id}</td>
            <td width="50%">Creation date: {$ticket->datacreazione}</td>
        </tr>
        <tr>
            <td>Priority: {$ticket->priorita}</td>
            <td>Last modify: {$ticket->ultimamodifica}</td>
        </tr>
        <tr>
            <td>Status: {$ticket->status}</td>
            <td>Close date: {$ticket->datachiusura}</td>
        </tr>
        <tr>
            <td>Category: {$ticket->categoria}</td>
            <td>Created by: {$ticket->email}</td>
        </tr>
    </table>
<h2>Ticket description</h2>
<p>{$ticket->descrizione}</p>
</div>

<h2>Ticket Notes</h2>
<div id="ticket_footer">
    <div id="ticket_notes">
        <div id="notes">
    {foreach from=$notes item="note"}
            <table class="note">
                <tr>
                    <td width="60%">From: {$note->mail}</td>
                    <td width="40%">Date: {$note->data}</td>
                </tr>
                <tr>
                    <td>{$note->testo}</td>
                </tr>
            </table>
    {/foreach}
        </div>
        <form method="POST" action="execute_new_ticket_note.php" id="new_note" style="width: 100%; margin-top: 20px;">
            <textarea name="text" id="testo" class="enewsbox validate[required]"></textarea>
            <input type="submit" class="button" value="Add note" />
            <input type="hidden" value="{$ticket->id}" name="ticket_id" />
            <input type="hidden" value="{$user_id}" name="user_id" />
        </form>
    </div>
    <div id="ticket_update">
		{if $administrator || $developer}
        <form method="POST" action="execute_ticket_update.php" id="update_status" style="width: 80%; margin: 20px 40px;">
            <h3>Status</h3>
            <ul>
                <li>
                    <label>
                        {if trim($ticket->status) == "new"}
                            <input type="radio" name="status" value="new" checked="checked"/>
                        {else}
                            <input type="radio" name="status" value="new"/>
                        {/if}
                        New
                    </label>
                </li>
                <li>
                    <label>
                        {if trim($ticket->status) == "working"}
                            <input type="radio" name="status" value="working" checked="checked"/>
                        {else}
                            <input type="radio" name="status" value="working"/>
                        {/if}
                        Working
                    </label>
                </li>
                <li>
                    <label>
                        {if trim($ticket->status) == "testing"}
                            <input type="radio" name="status" value="testing" checked="checked"/>
                        {else}
                            <input type="radio" name="status" value="testing"/>
                        {/if}
                        Testing
                    </label>
                </li>
                <li>
                    <label>
                        {if trim($ticket->status) == "fixed"}
                            <input type="radio" name="status" value="fixed" checked="checked"/>
                        {else}
                            <input type="radio" name="status" value="fixed"/>
                        {/if}
                        Fixed
                    </label>
                </li>
                <li>
                    <label>
                        {if trim($ticket->status) == "invalid"}
                            <input type="radio" name="status" value="invalid" checked="checked"/>
                        {else}
                            <input type="radio" name="status" value="invalid"/>
                        {/if}
                        Invalid
                    </label>
                </li>
            </ul>
            <h3>Assigned to</h3>
            <select name="assigned_to" style=" width: 100%; margin-bottom: 5px;">
                <option value="-1"></option>
                {foreach from=$no_notifier item="user"}
                    {if $user->id eq $ticket->id_assegnato}
                        <option value="{$user->id}" selected="selected">{$user->email}</option>
                    {else}
                        <option value="{$user->id}" >{$user->email}</option>
                    {/if}
                {/foreach}
            </select>
            <input type="submit" value="Update" class="button">
            <input type="hidden" value="{$ticket->id}" name="ticket_id" />
            <input type="hidden" value="{$ticket->progetto}" name="project_id" />
        </form>
		{/if}
    </div>
</div>
