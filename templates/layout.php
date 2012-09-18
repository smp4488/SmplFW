<!DOCTYPE html>
<html>
    <head>
	<title><?php echo !empty($this->title) ? $this->title : 'SmplFW';?></title>
	
	<?php foreach ($this->styleSheets as $styleSheet){?>
	<link rel="stylesheet" type="text/css" href="<?php echo $styleSheet;?>" />
	<?php } ?>
	<?php foreach ($this->javaScripts as $javaScripts){?>
	<script type="text/javascript" href="<?php echo $javaScripts;?>"></script>
	<?php } ?>	
    </head>

    <body>
	<?php include($this->actionTemplate); ?>
    </body>

</html>