<?php
$fff="greencard.pdf";
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="greencard.pdf"');
readfile($fff);
unlink($fff); 
?>
