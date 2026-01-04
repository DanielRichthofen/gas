<!-- ====== vista_general.php (solo visualizar todo) ====== -->
<?php include 'conexion.php'; ?>
<html><body>
<h2>Vista General de Usuarios y Cursos</h2>
<?php
$usuarios = $conexion->query("SELECT * FROM empleados");
while($u=$usuarios->fetch_assoc()):
$cursos = $conexion->query("SELECT * FROM cursos WHERE usuario_id={$u['Id']}");
?>
<h3><?= $u['Nombre'] ?> (<?= $u['Curp'] ?>)</h3>
<table border="1" width="100%">
<tr><th>ID DC3</th><th>Curso</th><th>Empresa</th><th>Estatus</th></tr>
<?php while($c=$cursos->fetch_assoc()): ?>
<tr>
<td><?= $c['id_dc3'] ?></td>
<td><?= $c['curso'] ?></td>
<td><?= $c['empresa'] ?></td>
<td><?= $c['estatus'] ?></td>
</tr>
<?php endwhile; ?>
</table>
<?php endwhile; ?>
</body></html>