<!-- ====== admin.php (panel completo) ====== --> (alta / baja usuarios y cursos) ====== -->
<?php include 'conexion.php';


// Agregar usuario
if(isset($_POST['add_user'])){
$conexion->query("INSERT INTO usuarios(curp,nombre) VALUES('{$_POST['curp']}','{$_POST['nombre']}')");
}


// Eliminar usuario
if(isset($_GET['del_user'])){
$conexion->query("DELETE FROM usuarios WHERE id={$_GET['del_user']}");
}


// Agregar curso
if(isset($_POST['add_curso'])){
$conexion->query("INSERT INTO cursos(usuario_id,id_dc3,curso,empresa,estatus)
VALUES('{$_POST['usuario_id']}','{$_POST['id_dc3']}','{$_POST['curso']}','{$_POST['empresa']}','{$_POST['estatus']}')");
}


// Editar curso
if(isset($_POST['edit_curso'])){
$conexion->query("UPDATE cursos SET id_dc3='{$_POST['id_dc3']}', curso='{$_POST['curso']}', empresa='{$_POST['empresa']}', estatus='{$_POST['estatus']}' WHERE id={$_POST['curso_id']}");
}


// Eliminar curso
if(isset($_GET['del_curso'])){
$conexion->query("DELETE FROM cursos WHERE id={$_GET['del_curso']}");
}


$usuarios = $conexion->query("SELECT * FROM empleados");("SELECT * FROM empleados");
?>
<html>
<body>
<h2>Administrador de Capacitaciones</h2>


<h3>Agregar Usuario</h3>
<form method="POST">
<input name="curp" placeholder="CURP" required>
<input name="nombre" placeholder="Nombre" required>
<button name="add_user">Agregar Usuario</button>
</form>


<h3>Usuarios Registrados (Gestión rápida)</h3>
<table border="1" width="50%">
<tr><th>CURP</th><th>Nombre</th><th>Acciones</th></tr>
<?php while($u=$usuarios->fetch_assoc()): ?>
<tr>
<td><?= $u['Curp'] ?></td>
<td><?= $u['Nombre'] ?></td>
<td><a href="?del_user=<?= $u['Id'] ?>" onclick="return confirm('¿Eliminar usuario?')">Eliminar</a></td>
</tr>
<tr>
<td colspan="3">
<strong>Agregar Curso</strong>
<form method="POST">
<input type="hidden" name="usuario_id" value="<?= $u['Id'] ?>">
<input name="id_dc3" placeholder="ID DC3" required>
<input name="curso" placeholder="Curso" required>
<input name="empresa" placeholder="Empresa" required>
<select name="estatus">
<option>Vigente</option>
<option>Vencido</option>
<option>Por vencer</option>
</select>
<button name="add_curso">Agregar Curso</button>
</form>
</td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>