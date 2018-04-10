<?php

$binlen = 8; # Bits that are required for hex decimal
$binary = (string) file_get_contents('./binary.txt');

$filename = './challenge.txt.gz';

if (file_exists($filename)) unlink($filename); 

$fp = fopen($filename, 'w');

for ($i = 0; $i < strlen($binary) / $binlen; $i++) {
    $bin = substr($binary, $i * $binlen, $binlen);
    $dec = bindec($bin);

    $char = chr($dec);

    echo $i . "\t" . $bin . "\t" . $char . PHP_EOL;

    fwrite($fp, $char);
}

fclose($fp);