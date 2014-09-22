<?php
$pathName = './';

foreach(new DirectoryIterator($pathName) as $fileInfo) {
	echo $fileInfo . "<br/>";
}
?>