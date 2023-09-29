<?php

require_once 'vendor/autoload.php';

use thiagoalessio\TesseractOCR\TesseractOCR;

$tesseractOCR = new TesseractOCR();

echo str_pad("", 50, "#") . PHP_EOL;

$tesseractOCR->image('Balancete2022.jpg');
$tesseractOCR->lang('por');

$result = $tesseractOCR->run();

echo $result;