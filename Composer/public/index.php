<?php
/**
 * Created by PhpStorm.
 * User: tomy
 * Date: 25/09/18
 * Time: 09:41
 */

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use HelloWorld\SayHello;
use App\Wcs\Hello;

$hello = new Hello();

echo $hello -> talk(), "<br>";

$helloE = new SayHello();

echo $helloE -> world(), "<br>";