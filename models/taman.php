<?php

class Taman {
	public $id;
	public $nama;
	public $lokasi;

	public function __construct($id, $nama, $lokasi)  
    {  
        $this->id = $id;
	    $this->nama = $nama;
	    $this->lokasi = $lokasi;
    } 
}

?>
