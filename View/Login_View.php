<?php

	class Login{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; 
?>	
			<center><h1><p id='Login'>Login</p></h1></center>
			<form name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobar_login();">
		
				 	Login : <input type = 'text' name = 'login' id='login' placeholder = 'Utiliza tu Dni' size = '9' value = '' onsubmit="comprobarVacio('login')  && comprobarAlfabetico('login',15)" required><br>
				 	
					Password : <input type = 'password' name = 'password'id='password' placeholder = 'Letras y numeros' size = '15' value = '' onsubmit="comprobarVacio('password')  && comprobarAlfabetico('password',128)" required=""><br>

					<br>

					<input type='submit' name='action' class="btn btn-add" value='Login'>

			</form>					
<?php
			include '../View/Footer.php';

		} //fin metodo render

	} //fin Login

?>
