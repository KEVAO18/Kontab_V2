
<?php

include_once ('conexionController.php');

/**
 * @KEVAO18
 */
class sqlController extends conexionController{
	
	private $conexion;

	function __construct(){
		$this->conexion = new conexionController();
	}

	public function getConection(){
		return $this->conexion->conect();
	}

	public function setConection($con){
		$this->conexion = $con;
	}

	public function consultaSQL($consulta){

		$query = $this->getConection()->prepare($consulta);
		$query->execute();
		return $query;
	}

	public function All($tabla){
		return $this->consultaSQL("SELECT * FROM $tabla");
	}

	public function AnyColumn($tabla, $columna){
		return $this->consultaSQL("SELECT $columna FROM $tabla");
	}

	public function where($tabla, $columna, $val, $oper = '='){
		return $this->consultaSQL("SELECT * FROM $tabla WHERE $columna $oper '$val'");
	}

	public function insert($tabla, $columnas, $valores){
		$q = $this->consultaSQL("INSERT INTO $tabla ($columnas) VALUES ($valores)");
	}

	public function delete($tabla, $columna, $val, $oper = '='){
		$q = $this->consultaSQL("DELETE FROM $tabla WHERE $columna $oper '$val'");
	}

	public function update($tabla, $columna, $id, $val, $oper = '='){
		$q = $this->consultaSQL("UPDATE $tabla SET $columna = '$val' WHERE id $oper $id");
	}

}

?>