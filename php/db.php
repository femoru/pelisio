<?php
	class DBmysql {
		private $link;
	    private $host, $username, $password, $database;

	    public function __construct($host, $username, $password, $database){
	        $this->host        = $host;
	        $this->username    = $username;
	        $this->password    = $password;
	        $this->database    = $database;

	        $this->link = mysqli_connect($host,$username,$password,$database) or
			die('Error en conexion (' .  mysqli_connect_error());

	        return true;
		}

		public function consulta($consulta) {
			$result = $this->link->query($consulta);
	        if (!$result) die('Consulta invalida: ' . mysqli_error());

	        $finfo = $result->fetch_fields();

			while($row = $result->fetch_array()) {
				$data = null;
				foreach ($finfo as $val) {
			    	$data[$val->name] = $row[$val->name];

				}
				$temp[$row[0]] = $data;
			}
	        return $temp;
    	}

    	public function desconectar(){
    		mysqli_close($this->link);
    	}

    	public function statment($query){
    		return $this->link->prepare($query);
    	}
    
	}
?>