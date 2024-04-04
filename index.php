<?php require_once 'conn/config.php'; ?>
<?php include_once 'header.php'; ?>
    
<?php 
foreach ($_REQUEST as $___opt => $___val):
  $$___opt = $___val;
endforeach;

if (empty($url)):
	include 'view/home.php';
	
elseif (substr($url, 0, 4)=='http' or substr($url, 0, 1)=="/" or substr($url, 0, 1)=="."):
    include 'view/404.php';

elseif ( file_exists("view/$url.php") ):
    include 'view/'.$url.'.php';
    
else:
    include 'view/404.php';
	
endif;
?>

<?php include_once 'footer.php'; ?>