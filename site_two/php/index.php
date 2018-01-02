<?php
$x = 5985;
var_dump($x);
echo "<br>"; 
$x = -345; // 负数
var_dump($x);
echo "<br>"; 
$x = 0x8C; // 十六进制数
var_dump($x);
echo "<br>";
$x = 047; // 八进制数
var_dump($x);
$x = 10.365;
var_dump($x);
echo "<br>"; 
$x = 2.4e3;
var_dump($x);
echo "<br>"; 
$x = 8E-5;
var_dump($x);

$x=true;
$y=false;
$arr = array('a'=>'d');
var_dump($arr);

$x="Hello world!";
$x=null;
var_dump($x);

/*
$x = 5;
function myTest(){
  global $x;
  echo "$x";
  $y = GlOBALS['x'];
  echo "$x";
  static $x=9;
  $x++;
  echo $x;
}
myTest();
myTest();
myTest();
myTest();
*/
?>