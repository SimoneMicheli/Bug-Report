<!-- Start Bottom Information -->
</div>
<div id="bottominfo">
  <div class="container">
    <!-- bottom left information -->
    <div class="bottomcolumn">
      <h3>{$title}</h3>
        <ul class="borderedlist iconlist">
        {foreach from=$notes item="note"}
            <li><a href="{$link}?id={$note->id}"" rel="facebox" "title="{substr($note->testo,0,150)}">{substr($note->testo,0,150)}... (<b>{$note->data2}</b>)</a></li>
        {/foreach}
        </ul>
    </div>
    <hr />
  </div>
</div>
<div id="footer">
  <div class="container"> <a id="designby" href="" title="BUGBOX">Copyright &copy; BUGBOX 2011 </a>
  </div>
</div>
</body>
</html>
