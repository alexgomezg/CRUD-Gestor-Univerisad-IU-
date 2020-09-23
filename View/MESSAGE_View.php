<?php

class MESSAGE{

	private $string; 
	private $volver;

	function __construct($string, $volver){
		$this->string = $string;
		$this->volver = $volver;	
		$this->render();
	}

	function render(){

		//include '../Locale/Strings_'.$_SESSION['idioma'].'.php';
		include '../View/Header.php';
?>
		<br>
		<br>
		<br>
		<?php
		//Comprueba si la entrada es un array, y por tanto es el array de errores
		if(is_array($this->string)){
			echo "<center><table border=0 class=tablaInicio>";
		for($i=0;$i<count($this->string,0);$i++){
			//Recorro dentro del array los arrays de errores y solo muestro aquellos que no estan a true
	 	if(is_array($this->string[$i])){
	 		//Compruebo si ya estoy en un array de errores (el compuesto por los tres parametros nombreatributo, codigoincicencia) sucede en el caso de llamar a la clase MESSAGE comprobando un solo atributo.
	 		if(!isset($this->string[$i]['nombreatributo'])){
	 			//Si no lo estoy recorro el array de mensajes de error y los muestro
	 		for($j=0;$j<count($this->string[$i],0);$j++){
			echo "<tr><td><div class=caja_mensaje_rojo2>";
			echo "<img src=../View/Images/warning.png width=25>";
		echo $this->string[$i][$j]['nombreatributo'].": ".$this->string[$i][$j]['mensajeerror']."</td></tr>";
	 		}
	 	}else{
	 		echo "<tr><td><div class=caja_mensaje_rojo2 data-lang=>";
			echo "<img src=../View/Images/warning.png width=25>";
	 		echo $this->string[$i]['nombreatributo'].": ".$this->string[$i]['mensajeerror']."</td></tr>";
	 	}
	 }



      }
      echo "</table></center>";



		}else{

		if((strpos($this->string,'fallid')!==false)||(strpos($this->string,'Err')!==false)){
			echo "<div class=caja_mensaje_rojo data-lang=\"".$this->string."\">";
		}else{
			echo "<center><div class=caja_mensaje data-lang=\"".$this->string."\">";
		}
		echo "</div>";
	}
?>
	
<?php		
		//echo $strings[$this->string];

?>
		
		
	</div></center>
		<br>
		<br>
		<br>

<?php

		echo '<a href=\'' . $this->volver . "'><img src=../View/Images/return.png width=75></a>";
		include '../View/Footer.php';
	} //fin metodo render

}
