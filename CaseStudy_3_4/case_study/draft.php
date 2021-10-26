<?php
$json = '{"a":[null, 123],"b":2,"c":3,"d":4,"e":5}';

$x =  json_decode($json, true);
echo is_null($x["a"][0]);
// echo $x["a"][1];

?>