<?php
namespace Libs;

/**
* Classe Image
*/
class Image
{
	private $file;
	private $size = IMG_SIZE;
	private $width;
	private $height;
	private $folder = IMG_FOLDER;
	private $extension = array('jpg', 'png', 'gif');
	
	function __construct() {}

	public function __set($property, $value)
	{
		$method = "set{$property}";
		if(method_exists($this, $method))
			return $this->$method($value);
	}

	/**
	 * método upload
	 * @param $file contém dos dados da imagem para upload
	 * @return $data com informação do nome do arquivo e pasta onde foi salvo
	 */
	public function upload($file)
	{
		$fileExtension = strtolower(end(explode('.', $file['image']['name'])));

		if (!in_array($fileExtension, $this->extension))
			throw new \Exception("Este arquivo não possui uma das extensões: jpg, png ou gif.");
		elseif ($file['image']['size'] > $this->size)
			throw new \Exception("O arquivo ultrapassou o limite máximo de {$this->size} bytes");

		if (!is_dir($this->folder)) {
			mkdir($this->folder);
		}

		$images = scandir($this->folder);
		$filename = $file['image']['name'];
		$i = 1;

		while (in_array($filename, $images)) {
			$image = preg_replace('/\.' . $fileExtension . '/', '', $filename);
			$filename = $image . '-' . $i . '.' . $fileExtension;
			$i++;
		}

		if (preg_match('/\//', $this->folder)) {
			$folders = explode('/', $this->folder);
			$this->folder = NULL;
			foreach ($folders as $folder) {
				if ($folder != '') {
					$this->folder .= $folder . '/';
				}
			}
		} else {
			$this->folder = $this->folder . '/';
		}

		$uploadFile = $this->folder . $filename;

		$data = array(
			'name'		=> $filename,
			'folder'	=> $this->folder
		);

		if (move_uploaded_file($file['image']['tmp_name'], $uploadFile)) {
			return $data;
		} else {
			return false;		
		}
	}

	/**
	 * método setSize
	 * @param $size Limite de KBs da imagem
	 */
	public function setSize($size)
	{
		$this->size = $size;
	}

	/**
	 * método setWidth
	 * @param $width Limite da largura da imagem
	 */
	public function setWidth($width)
	{
		$this->width = $width;
	}

	/**
	 * método setHeight
	 * @param $height Limite da altura da imagem
	 */
	public function setHeight($height)
	{
		$this->height = $height;
	}

	/**
	 * método setFolder
	 * @param $folder Contém o nome da pasta a ser definida para upload
	 */
	public function setFolder($folder)
	{
		$this->folder = IMG_FOLDER . $folder;
	}
}