<?php
/**
 * Created by PhpStorm.
 * User: caleb
 * Date: 2018/6/20
 * Time: 下午12:18
 */

define('BBBB', "Constant BBBB in normal file.<br>");
include "FirstClass.php";
include "class2.php";
use NS\MyProject1 as NM1;

const EEEE = 'Constant EEEE out of namespace, in this fine.<br>';

echo "Print a constant define in another namespace.<br>";
echo BBBB;
echo CCCC;
echo NM1\EEEE."<br>";
echo EEEE;
$obj = new NS\MyProject1\FirstClass();
echo 'Echo $aaa: '.$aaa;
$obj->printConstant();
echo AAAA;
NS\MyProject1\foo();
NM1\foo();