<!-- ====== consulta.php (procesa la consulta) ====== -->
<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Resultado de consulta</title>
</head>
<body>
<h2>Resultado de la consulta</h2>
<?php
if(isset($_POST['Curp'])){
$curp = $_POST['Curp'];
$sql = $conexion->query("SELECT * FROM empleados WHERE Curp='$curp'");
if($sql->num_rows > 0){
$usuario = $sql->fetch_assoc();
$cursos = $conexion->query("SELECT * FROM cursos WHERE usuario_id={$usuario['Id']}");
echo "<h3>{$usuario['Nombre']}</h3>";
echo "<table border='1'><tr><th>ID DC3</th><th>Curso</th><th>Empresa</th><th>Estatus</th></tr>";
while($c=$cursos->fetch_assoc()){
echo "<tr><td>{$c['id_dc3']}</td><td>{$c['curso']}</td><td>{$c['empresa']}</td><td>{$c['estatus']}</td></tr>";
}
echo "</table>";
} else {
echo "<p>CURP no encontrada</p>";
}
}
?>
<br><a href="index.html">Nueva consulta</a>
</body>
</html>