<?php

class Aduan {
	public $id;
	public $waktu;
	public $deskripsi;
	public $id_kategori;
	public $id_status;
	public $id_taman;
	
	public function __construct($deskripsi, $id_kategori, $id_taman)  
    {  
        $this->deskripsi = $deskripsi;
	    $this->id_kategori = $id_kategori;
	    $this->id_taman = $id_taman;
	    $this->id_status = 1;
    } 
}

?>
