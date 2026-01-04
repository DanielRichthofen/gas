<!-- ====== gestionar_cursos.php (editar / eliminar) ====== -->
<?php include 'conexion.php';
if(isset($_POST['edit'])){
$conexion->query("UPDATE cursos SET id_dc3='{$_POST['id_dc3']}', curso='{$_POST['curso']}', empresa='{$_POST['empresa']}', estatus='{$_POST['estatus']}' WHERE id={$_POST['id']}");
}
if(isset($_GET['del'])){
$conexion->query("DELETE FROM cursos WHERE id={$_GET['del']}");
}
$cursos = $conexion->query("SELECT cursos.*, empleados.Nombre FROM cursos JOIN empleados ON cursos.usuario_id=Empleados.Id");
?>
<html><body>
<h2>Editar / Eliminar Cursos</h2>
<table border="1" width="100%">
<tr><th>Usuario</th><th>ID DC3</th><th>Curso</th><th>Empresa</th><th>Estatus</th><th>Acciones</th></tr>
<?php while($c=$cursos->fetch_assoc()): ?>
<tr>
<form method="POST">
<td><?= $c['Nombre'] ?></td>
<td><input name="id_dc3" value="<?= $c['id_dc3'] ?>"></td>
<td><input name="curso" value="<?= $c['curso'] ?>"></td>
<td><input name="empresa" value="<?= $c['empresa'] ?>"></td>
<td>
<select name="estatus">
<option <?= $c['estatus']=='Vigente'?'selected':'' ?>>Vigente</option>
<option <?= $c['estatus']=='Vencido'?'selected':'' ?>>Vencido</option>
<option <?= $c['estatus']=='Por vencer'?'selected':'' ?>>Por vencer</option>
</select>
</td>
<td>
<input type="hidden" name="id" value="<?= $c['id'] ?>">
<button name="edit">Guardar</button>
<a href="?del=<?= $c['id'] ?>" onclick="return confirm('¿Eliminar curso?')">Eliminar</a>
</td>
</form>
</tr>
<?php endwhile; ?>
</table>
</body></html>