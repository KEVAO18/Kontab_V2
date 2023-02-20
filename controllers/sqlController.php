
<?php

include_once ('conexionController.php');

/**
 * @KEVAO18
 */
class sqlController extends conexionController{


	/**
	 * 
	 * @var conexionController $conexion Es un objeto de la clase conexion usado para conectarce con la bd
	 * 
	 */
	private $conexion;

	function __construct(){
		$this->conexion = new conexionController();
	}

	/**
	 * 
	 * @return PDO retorna un objeto de la clase conexionController
	 * 
	 */

	public function getConection(){
		return $this->conexion->conect();
	}

	/**
	 * 
	 * @param PDO $con
	 * 
	 * @return void
	 * 
	 */

	public function setConection($con){
		$this->conexion = $con;
	}

	/**
	 * 
	 * @param string $consulta consulta escrita en SQL
	 * 
	 * @return PDO conexion a la bd
	 * 
	 * @method consultaSQL(string $consulta) la consulta se escribe en sql con comillas dobles
	 * 
	 */

	public function consultaSQL(string $consulta){
		$query = $this->getConection()->prepare($consulta);
		$query->execute();
		return $query;
	}

	/**
	 * 
	 * @param string $tabla es la tabla a la que se le quiere pedir la informacion
	 * 
	 * @return PDO datos obtenidos de la tabla
	 * 
	 * @method All($tabla) obtiene todos los datos de la tabla indicada
	 * 
	 */

	public function All($tabla){
		return $this->consultaSQL("SELECT * FROM $tabla");
	}

	/**
	 * 
	 * @param string $tabla es la tabla a la que se le quiere pedir la informacion
	 * 
	 * @param string $columna columnas que se desean obtener de la base de datos
	 * 
	 * @return PDO datos obtenidos de la tabla
	 * 
	 * @method AnyColumn($tabla, $columna) obtiene los datos de la tabla indicada en las columnas indicadas
	 * 
	 */

	public function AnyColumn($tabla, $columna){
		return $this->consultaSQL("SELECT $columna FROM $tabla");
	}

	/**
	 * 
	 * @param string $tabla es la tabla a la que se le quiere pedir la informacion
	 * 
	 * @param string $columna valor de comparacion especifico
	 * 
	 * @param string $val valor a comparar con la columna, puede variar
	 * 
	 * @param string $oper valor definido para el operador de la comparacion, definodo como '=' por defecto
	 * 
	 * @return PDO datos obtenidos de la tabla
	 * 
	 * @method where($tabla, $columna, $val) obtiene los datos obtenidos mediante las comparaciones realizadas
	 * 
	 * @method where($tabla, $columna, $val, $oper) obtiene los datos obtenidos mediante las comparaciones realizadas
	 * 
	 */
	
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

	public function innerJoin($tabla, $columnas, $unirCon, $condicionante, $condicion){
		$q = $this->consultaSQL("SELECT $columnas FROM $tabla INNER JOIN $unirCon ON $condicionante = $condicion");
	}

	/**
	 * @param $tabla
	 */

	public function innerJoinConWhere($tabla, $columnas, $unirCon, $condicionante, $condicion, $condicionW, $condicionadoW, $oper = '='){
		$q = $this->consultaSQL("SELECT $columnas FROM $tabla INNER JOIN $unirCon ON $condicionante = $condicion WHERE $condicionW $oper $condicionadoW");
	}

}

?>