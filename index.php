<?php

require_once 'vendor/autoload.php';

use thiagoalessio\TesseractOCR\TesseractOCR;

$tesseractOCR = new TesseractOCR();

echo str_pad("", 50, "#") . PHP_EOL;

$tesseractOCR->image('DRE 2022_page-0001.jpg');
$tesseractOCR->psm(4); //Faz o texto ser lido como uma única coluna
$tesseractOCR->lang('por');

$result = $tesseractOCR->run();

echo $result;