<?php	
	/**
	* Esta clase valida todos los datos de entrada al servidor
	*/
	class Validador 
	{

		public $errores = array();		
		
		
		/**
		 * esta funcion valida las variables que vengan en el post y el get
		 * dependiendo de las reglas recibidas
		 */
		public function validar($datos, $reglas){
			
			$valido = TRUE;

			foreach ($reglas as $campo => $regla) {
				
				$verificadores = explode('|', $regla);

				foreach ($verificadores as $verificador) {
					$valor = isset($datos[$campo]) ? $datos[$campo] : NULL;
					if( !$this->$verificador($valor, $campo) ){
						$valido = FALSE;
					}
				}

			}
			return $valido;	
		}

		/**
		 * valida que un valor sea un email valido
		 */
		private function email($valor, $campo){
			$valido = filter_var($valor, FILTER_VALIDATE_EMAIL);
			if(!$valido){
				$this->errores[] = "El campo ".$campo." necesita un email valido";				
			}
			return $valido;
		}

		/**
		 * verifica que un valor no este vacio
		 */
		private function requerido($valor, $campo){
			$valido = !empty($valor);
			if(!$valido){
				$this->errores[] = "El campo ".$campo." es requerido";				
			}
			return $valido;
		}

		/**
		 * comprueba que un rut sea valido
		 */
		private function rut($valor, $campo){
			//return TRUE;
			$dv = substr($valor, -1);
			$rut = substr($valor, 1,-3);
			
			$s=1;
			for($m=0;$valor!=0;$valor/=10)
				$s=($s+$valor%10*(9-$m++%6))%11;

			$valido = chr($s?$s+47:75) == $dv;
			if(!$valido){
				$this->errores[] = "El campo ".$campo." necesita un rut valido";				
			}
			return $valido;
		}

		/**
		 * verifica que el token recibido sea igual al de la sesion activa
		 */
		private function token($valor, $campo){
			$valido = $valor == $_SESSION['token'];
			if(!$valido){
				$this->errores[] = "El campo ".$campo." necesita un token valido";				
			}
			return $valido;
		}

		/**
		 * verifica si el valor recibido es numerico
		 */
		private function numero($valor, $campo){
			$valido = is_numeric($valor);
			if(!$valido){
				$this->errores[] = "El campo ".$campo." necesita un numero valido";				
			}
			return $valido;
		}

		/**
		 * verifica si el valor recibido es texto
		 */
		private function texto($valor, $campo){
			$valido = is_string($valor);
			if(!$valido){
				$this->errores[] = "El campo ".$campo." necesita un texto valido";				
			}
			return $valido;
		}

		/**	
		*	verifica si el valor recibido es un array
		**/
		private function arreglo($valor, $campo){
			$valido = is_array($valor);
			if(!$valido){
				$this->errores[] = "El campo ".$campo." necesita un arreglo valido";				
			}
			return $valido;
		}

		/**	
		*	verifica si el valor recibido es un array
		**/
		private function fecha($valor, $campo){
			$pattern = '/\d{2}-\d{2}-\d{4}/'; // regex para fecha formato: DD-MM-AAAA ej: 17-07-2014

			$valido = preg_match($pattern, $valor);
			if(!$valido){
				$this->errores[] = "El campo ".$campo." necesita una fecha valida ej: 14-04-2014";				
			}
			return $valido;
		}
	}
