<!-- ====== index.php (consulta pública) ====== -->
<?php include 'conexion.php'; $resultado=null;
if(isset($_POST['curp'])){
$curp=$_POST['curp'];
$sql=$conexion->query("SELECT * FROM empleados WHERE Curp='$curp'");
if($sql->num_rows>0){
$usuario=$sql->fetch_assoc();
$cursos=$conexion->query("SELECT * FROM cursos WHERE usuario_id={$usuario['Id']}");
}
}
?>
<html><body>
<h2>Verifica tus capacitaciones</h2>
<form method="POST"><input name="curp" placeholder="CURP"><button>Verificar</button></form>
<?php if(isset($usuario)): ?>
<h3><?= $usuario['Nombre'] ?></h3>
<table border="1"><tr><th>ID DC3</th><th>Curso</th><th>Empresa</th><th>Estatus</th></tr>
<?php while($c=$cursos->fetch_assoc()): ?>
<tr><td><?= $c['id_dc3'] ?></td><td><?= $c['curso'] ?></td><td><?= $c['empresa'] ?></td><td><?= $c['estatus'] ?></td></tr>
<?php endwhile; ?></table>
<?php endif; ?>
</body></html>