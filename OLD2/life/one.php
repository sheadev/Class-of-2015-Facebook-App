<?php
$bugs=array(
0 => array('position'=>array(-5,-5), 'traits'=>array('eyes'=>'black','speed'=>1,'mouth'=>'thick','gender'=>'male')),
1 => array('position'=>array(-5,5),  'traits'=>array('eyes'=>'brown','speed'=>2,'mouth'=>'thick','gender'=>'female')),
2 => array('position'=>array(5,5),   'traits'=>array('eyes'=>'blue', 'speed'=>3,'mouth'=>'thin', 'gender'=>'female')),
3 => array('position'=>array(5,-5),  'traits'=>array('eyes'=>'green','speed'=>4,'mouth'=>'thin', 'gender'=>'male'))
);
echo(str_replace("\n", "<br>", print_r($bugs)));
?>