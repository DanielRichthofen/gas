<!-- ====== vista_general.php ====== -->
<?php include 'conexion.php'; ?>
<html><body>
<?php $u=$conexion->query("SELECT * FROM empleados");
while($r=$u->fetch_assoc()){
$c=$conexion->query("SELECT * FROM cursos WHERE usuario_id={$r['Id']}");
echo "<h3>{$r['Nombre']}</h3><table border=1>";
while($x=$c->fetch_assoc()){
echo "<tr><td>{$x['id_dc3']}</td><td>{$x['curso']}</td><td>{$x['empresa']}</td><td>{$x['estatus']}</td></tr>";}echo "</table>";}
?>
</body></html>