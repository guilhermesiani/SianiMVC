<?php
namespace Libs;

/**
*
*  - Preencha o formulário
*  - Postar para o PHP
*  - Limpar os dados
*  - Validar
*  - Retornar os dados
*  - Adicionar ao banco
*
*/
class Form
{
	
	/** @var array $_currentItem Item postado imediatamente */
	private $_currentItem = null;

	/** @var array $_postData Histórico de dados postados */
	private $_postData = array();

	/** @var object $_val Objeto de validação */
	private $_val = array();

	/** @var array $_error Segura o erro atual no formulário */
	private $_error = array();	

	/**
	 *  Construtor
	 * Instanciar para validar os formulários
	 */
	public function __construct() 
	{
		require 'Form/Val.php';
		$this->_val = new Val();
	}

	/**
	 * post - This is o run $_POST
	 */
	public function post($field)
	{
		$this->_postData[$field] = $_POST[$field];
		$this->_currentItem = $field;
		
		return $this;
	}

	/**
	 * 
	 */
	public function fetch($fieldName = false)
	{
		if($fieldName) {
			if(isset($this->_postData[$fieldName]))
				return $this->_postData[$fieldName];
			else
				return false;
		} else {
			return $this->_postData;
		}
		
	}

	/**
	 * val - This is to validate
	 */
	public function val($typeOfValidator, $arg = null)
	{
		if($arg == null)
			$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
		else
			$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);

		if($error)
			$this->_error[$this->_currentItem] = $error;

		return $this;
	}

	public function submit()
	{
		if(empty($this->_error)) {
			return true;
		} else {
			$str = '';
			foreach($this->_error as $key => $value) {
				$str .= $key . ' => ' . $value . "\n";
			}
			throw new Exception($str);
		}
	}

}