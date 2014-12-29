<?php
namespace Libs;

/**
* 
*/
class Database extends \PDO
{
	
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		try {
			parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
		} catch(Exception $e) {
			die('Falha de conexão com o Banco de Dados.');
		}
	}

	/**
	 * select
	 * @param string $sql Uma string SQL
	 * @param array $array Valores para retornar
	 * @param constant $fetchMode Modo de captura de dados
	 * return mixed
	 */
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		$sth = $this->prepare($sql);
		foreach($array as $key => $value) {
			$sth->bindValue("$key", $value);
		}

		$sth->execute();

		return $sth->fetchAll($fetchMode);
	}

	/**
	 * insert
	 * @param string $table Nome da tabela a ser inserida
	 * @param string $data Um array associado
	 */
	public function insert($table, $data)
	{
		ksort($data);

		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));

		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

		foreach($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}

		$sth->execute();		
	}

	/**
	 * update
	 * @param string $table Nome da tabela a ser inserida
	 * @param string $data Um array associado
	 * @param string $where Onde será atualizado
	 */
	public function update($table, $data, $where)
	{
		ksort($data);

		$fieldDetails = NULL;
		foreach($data as $key => $value) {
			$fieldDetails .= "`$key` = :$key,";
		}		

		$fieldDetails = rtrim($fieldDetails, ',');

		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

		foreach($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}

		$sth->execute();
	}

	/**
	 * delete
	 * @param string $table
	 * @param string $where
	 * @param integer $limit
	 * @return integer Affected Rows
	 */
	public function delete($table, $where, $limit = 1)
	{
		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	}
}