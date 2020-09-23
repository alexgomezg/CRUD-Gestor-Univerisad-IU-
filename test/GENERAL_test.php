<?php
error_reporting(0);
// crear el array principal de test
	$ERRORS_array_test = array();
	$ERRORS1_array_test = array();
	$ERRORS2_array_test = array();
// incluimos aqui tantos ficheros de test como entidades
include '../test/Global_test.php';
include '../test/USUARIOS_test.php';
include '../test/PROFESOR_test.php';
include '../test/EDIFICIO_test.php';
include '../test/CENTRO_test.php';
include '../test/ESPACIO_test.php';
include '../test/TITULACION_test.php';
include '../test/PROF_TITULACION_test.php';
include '../test/PROF_ESPACIO_test.php';
include '../View/GENERAL_TEST_View.php';

include '../test/USUARIOS_VALIDACION_test.php';
include '../test/PROFESOR_VALIDACION_test.php';
include '../test/EDIFICIO_VALIDACION_test.php';
include '../test/CENTRO_VALIDACION_test.php';
include '../test/ESPACIO_VALIDACION_test.php';
include '../test/TITULACION_VALIDACION_test.php';
include '../test/PROF_TITULACION_VALIDACION_test.php';
include '../test/PROF_ESPACIO_VALIDACION_test.php';

function contarTest($array,$tipo){
	$cont=0;
	foreach ($array as $test)
	{
		if($tipo==$test['resultado']){
			$cont++;
		}
	}
	return $cont;
}



?>


<table align="center">
<tbody>
<tr>
<td class="caja_test_total">Total: <?php echo (count($ERRORS_array_test)+count($ERRORS1_array_test)+count($ERRORS2_array_test)); ?></td>
</tr>
</tbody>
</table>

<table align="center">
<tbody>
<tr>
<td class="caja_test_correcto">Bien: <?php echo (contarTest($ERRORS_array_test,'OK')+contarTest($ERRORS1_array_test,'OK')+contarTest($ERRORS2_array_test,'OK')); ?></td>
<td class="caja_test_incorrecto">Mal: <?php echo (contarTest($ERRORS_array_test,'FALSE')+contarTest($ERRORS1_array_test,'FALSE')+contarTest($ERRORS2_array_test,'FALSE'));?></td>
</tr>
</tbody>
</table>



<?php
// presentacion de resultados
?>
<h1>Pruebas Globales</h1>
<table align="center" class="table_principal">
	<thead>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Método
		</th>
		<th>
			Error testeado
		</th>
		<th>
			Error Esperado
		</th>
		<th>
			Error Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
</thead>
<?php
	foreach ($ERRORS1_array_test as $test)
	{
?>
	<tr>

	
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['entidad']."</font>";

			}else{
				echo $test['entidad'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['metodo']."</font>";

			}else{
				echo $test['metodo'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['error']."</font>";

			}else{
				echo $test['error'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['error_esperado']."</font>";

			}else{
				echo $test['error_esperado'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['error_obtenido']."</font>";

			}else{
				echo $test['error_obtenido'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['resultado']."</font>";

			}else{
				echo $test['resultado'];
			}
		?>
		</td>



	</tr>
<?php	
	}
?>
</table>















<?php
// presentacion de resultados
?>
<h1>Pruebas Unitarias</h1>
<table align="center" class="table_principal">
	<thead>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Método
		</th>
		<th>
			Error testeado
		</th>
		<th>
			Error Esperado
		</th>
		<th>
			Error Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
</thead>
<?php
	foreach ($ERRORS_array_test as $test)
	{
?>
	<tr>

	
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['entidad']."</font>";

			}else{
				echo $test['entidad'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['metodo']."</font>";

			}else{
				echo $test['metodo'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['error']."</font>";

			}else{
				echo $test['error'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['error_esperado']."</font>";

			}else{
				echo $test['error_esperado'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['error_obtenido']."</font>";

			}else{
				echo $test['error_obtenido'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['resultado']."</font>";

			}else{
				echo $test['resultado'];
			}
		?>
		</td>



	</tr>
<?php	
	}
?>
</table>




<?php
// presentacion de resultados
?>
<h1>Pruebas Validación</h1>
<table align="center" class="table_principal">
	<thead>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Atributo
		</th>
		<th>
			Error testeado
		</th>
		<th>
			Error Esperado
		</th>
		<th>
			Error Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
</thead>
<?php
	foreach ($ERRORS2_array_test as $test)
	{
?>
	<tr>

	
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['entidad']."</font>";

			}else{
				echo $test['entidad'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['metodo']."</font>";

			}else{
				echo $test['metodo'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['error']."</font>";

			}else{
				echo $test['error'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['error_esperado']."</font>";

			}else{
				echo $test['error_esperado'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['error_obtenido']."</font>";

			}else{
				echo $test['error_obtenido'];
			}
		?>
		</td>
		<td>
			<?php if($test['resultado']=='FALSE') {

				echo "<font color=red>".$test['resultado']."</font>";

			}else{
				echo $test['resultado'];
			}
		?>
		</td>



	</tr>
<?php	
	}
?>
</table>




