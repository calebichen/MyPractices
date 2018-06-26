<?php
/**
 * Created by PhpStorm.
 * User: caleb
 * Date: 2018/6/26
 * Time: 下午2:12
 */
echo "Just a test";
function testFunction()
{
    if(empty($_POST['kk'])) {
        echo "EMPTY";
    }
    echo "Add things at the same line. For auto merge test.";
    return "Hello world.<br>";
}
echo "Add an other line from web site editor.";
echo "Add one another for auto-merge test.";
function test2($var)
{
    echo "test".$var;
}
class Foo
{
    public function bar()
    {
        echo "Auto merge test.";
    }
}
