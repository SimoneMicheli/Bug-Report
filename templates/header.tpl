{config_load file="test.conf" section="header"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>{#title#}</title>
<link href="./stylesheets/common.css" rel="stylesheet" type="text/css" />
<script src="./js/jquery-1.6.1.min.js" type="text/javascript"></script>
<link href="./js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="./js/facebox/facebox.js" type="text/javascript"></script> 
<script type="text/javascript">
    $(document).ready(function(){
        $('a[rel*=facebox]').facebox() ;
    });
</script>
</head>
<body>
<!-- Start Header -->
<div id="header">
  <div class="container">
    <h1><a href="./" title="BUGBOX">BUGBOX<span></span></a></h1>
    <hr />
    {if $userDisplayName}
    <span id="navigation">Bentornato: {$userDisplayName}</span>
    {/if}
    <hr />
    <!-- banner message and building background -->
    <div id="banner">Professional light bug reporting</div>
    <hr />
  </div>
</div>
<!-- Start Main Content -->
<div id="main" class="container">
  <!-- main content area -->
  
