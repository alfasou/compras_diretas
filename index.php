<?php require_once('conn/config.php'); ?>
<?php include_once("header.php"); ?>    
    
<?php 
foreach ($_REQUEST as $___opt => $___val):
  $$___opt = $___val;
endforeach;

if (empty($pag)):
	include("view/home.php");
	
elseif (substr($pag, 0, 4)=='http' or substr($pag, 0, 1)=="/" or substr($pag, 0, 1)=="."):
    include("view/404.php");

elseif ( file_exists("view/$pag.php") ):
    include("view/$pag.php");
    
else:
    include("view/404.php");
	
endif;
?>

<?php include_once("footer.php"); ?>