<!-- ====== conexion.php ====== -->
<?php
$conexion = new mysqli('localhost','root','','capacitaciones');
if($conexion->connect_error){ die('Error DB'); }
?>
