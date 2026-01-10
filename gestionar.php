<!-- ====== gestionar.php ====== -->
<?php include 'conexion.php';
if(isset($_POST['edit'])){
$conexion->query("UPDATE cursos SET curso='{$_POST['curso']}' WHERE id={$_POST['id']}");}
if(isset($_GET['del'])){
$conexion->query("DELETE FROM cursos WHERE id={$_GET['del']}");}
$c=$conexion->query("SELECT cursos.*, empleados.Nombre FROM cursos JOIN empleados ON cursos.usuario_id=Empleados.Id");
?>
<html><body><table border=1>
<?php while($r=$c->fetch_assoc()): ?>
<tr><form method="POST">
<td><?= $r['Nombre'] ?></td>
<td><input name="curso" value="<?= $r['curso'] ?>"></td>
<td><input type="hidden" name="id" value="<?= $r['id'] ?>"><button name="edit">Guardar</button>
<a href="?del=<?= $r['id'] ?>">Eliminar</a></td>
</form></tr>
<?php endwhile; ?>
</table></body></html>