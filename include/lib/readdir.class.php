<?php
class readDirectory
{
	protected $isfiles = array();
	protected $isDirectory;
	
	public function __construct($dir)
	{
		$url = explode('/', $_SERVER["PHP_SELF"]);
		// Sub Folder
		for ($i=1;$i<(count($url)-1);$i++) { $subfolder .= $url[$i].'/'; }
		$isFolder = opendir($_SERVER["DOCUMENT_ROOT"].'/'.$subfolder.$dir);
		$this->isDirectory = $dir;
		while (($file = readdir($isFolder)) !== false)
		{
			if ($file!='.' && $file!='..')
			{
				$this->isfiles[] = $file;			
			}
		}
	}
	
	public function getfile()
	{
		return $this->isfiles;
	}
	public function getdir()
	{
		return $this->isDirectory;
	}
}
?>