<?php
require_once('controllers/laporan.php');
$laporan = new laporan();
echo $laporan->template2();