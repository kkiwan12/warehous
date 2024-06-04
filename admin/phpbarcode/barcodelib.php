<?php
$QR_BASEDIR = dirname(__FILE__).DIRECTORY_SEPARATOR;

// Required libs

require_once("$QR_BASEDIR/src/Barcode.php");
require_once("$QR_BASEDIR/src/BarcodeBar.php");
require_once("$QR_BASEDIR/src/BarcodeGenerator.php");
require_once("$QR_BASEDIR/src/BarcodeGeneratorSVG.php");
require_once("$QR_BASEDIR/src/BarcodeGeneratorPNG.php");
require_once("$QR_BASEDIR/src/Types/TypeInterface.php");
require_once("$QR_BASEDIR/src/Exceptions/BarcodeException.php");
require_once("$QR_BASEDIR/src/Exceptions/InvalidCharacterException.php");
require_once("$QR_BASEDIR/src/Exceptions/InvalidLengthException.php");
require_once("$QR_BASEDIR/src/Types/TypeCode128.php");



