<?php
/**
 * Created by PhpStorm.
 * User: caleb
 * Date: 2018/6/20
 * Time: 下午12:16
 */

namespace NS\MyProject1;

define('AAAA', "Constant AAAA in namespace MyProject1.<br>");
const EEEE = 'Constant EEEE in namespace MyProject1.<br>';
$aaa = 'String aaa in NS MyProject1<br>';


function foo()
{
    echo "Show the function set in namespace: MyProject1<br>";
}

class FirstClass
{
    static function myFunction()
    {

    }
    public function printConstant()
    {
        echo "Use AAAA in function printConstant(). ".AAAA;
    }
}

