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
<?php endwhile; ?>