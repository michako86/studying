<?php
	ob_start();
?>
<HTML>
<HEAD>
<TITLE>ob_start</TITLE>
</HEAD>
<BODY>
<?php
	print("На данный момент ");
	print(strlen(ob_get_contents()));
	print(" символов в буфере.<BR>\n");
?>
</BODY>
</HTML>
<?php
	header("X-Custom-Header: PHP");

	ob_end_flush();
?>
