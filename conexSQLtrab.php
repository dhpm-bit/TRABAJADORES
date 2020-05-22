<?php
include 'calcHorari.php';

$db_host="localhost";
$db_user="dhpm";
$db_password="Annanacho_01";
$db_name="trabajadores";
$db_table_name="empleats";
$db_table_name2="registro_mov";



//variables datos index
$subs_cod = ($_GET['codigo']);
//conexion via PDO
try{
	//para establecer conexión
   $conexion= new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
	// echo 'conexion ok';
   
   // Prepared Statements (para los resultados -datos)
	$statement = $conexion->prepare("SELECT codigo_id, nombre FROM  $db_table_name WHERE codigo_id= $subs_cod ");
   $statement->execute();

	$resultados = $statement->fetchAll();//para mostrar todo //fetch(); solo uno a uno
	foreach ($resultados as $resultado){
   $c=$resultado['codigo_id'];
   $nombre= $resultado['nombre'];}
//    echo $c;
//    echo $nombre;

   if (!isset($c)){
      echo 'no hay datos en DB';
      header ("Location:fail.html");

   }else{
   
      $statement = $conexion->prepare("INSERT INTO $db_table_name2 
      (id,codigo_id_em,nombre,fecha,entrada_salida)VALUES (?,?,?,?,?)");
  
      $va1=NULL;
      $va2=$subs_cod;
      $va3=$nombre;
      $va4=NULL; 
      $va5=control();
         

      $statement->bindParam(1,$va1);
      $statement->bindParam(2,$va2);
      $statement->bindParam(3,$va3);
      $statement->bindParam(4,$va4);
      $statement->bindParam(5,$va5);


      $statement->execute();
         
      header ("Location:good.html");}
         
      


}catch (PDOException $e){
	//en caso negativo
	echo 'error: '. $e->getMessage();

}
