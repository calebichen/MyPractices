<?php
/**
 * Created by PhpStorm.
 * User: caleb
 * Date: 2018/6/18
 * Time: 下午3:58
 */
echo "<h1>===Note===</h1>";
echo "This series of tests are about: Closures, callback and static property in a class.<br>";
echo "<b>Definition of callback:</b><Br>";
echo "<span style='color:red;'>Provide a function as an argument to another function.</span> <br>";
echo "<b>Definition of Closures:</b><br>";
echo "<span style='color:red;'>They are anonymous functions which are functions with no name that capable of accessing variables outside of the function scope.</span><br>";
/*echo "Passing by Reference.<br>";
function funTest1(&$var, $var2)
{
    $var = $var*2;
    return $var2 + $var;
}
$a1 = 4;
$a2 = 7;
echo funTest1($a1, $a2)."\n";
echo $a1;
echo "<br>----LINE:".__LINE__."----<br>";*/

echo "<br>----LINE:".__LINE__."----<br>";
echo "Closures practice.<br>";
$userName = "Caleb";
$greeting = function () use ($userName){
    return "Hello, {$userName}";
};
echo $greeting();
echo "<br>";
$greeting = function ($userName){
    return "Hello, {$userName}";
};
$name = "LuLu Chen";
echo $greeting($name);

/**
 * Callback practice.
 */
function myCallbackFunction1($str)
{
    echo "Hello world! Follow with given string: ".$str;
}

class MyClassTest1
{
    static function myCallbackMethod($var)
    {
        return "Add some word from {$var}, and then.<br>";
    }

    public function myCallbackPublicFunction($var)
    {
        return "Show this from public Method. Variable: {$var}";
    }
}
echo "<br>----LINE:".__LINE__."----<br>";
echo "Callback Type 1: Simple callback.<br>";
call_user_func('myCallbackFunction1', "TEST WORD");

echo "<br>----LINE:".__LINE__."----<br>";
echo "Callback Type 2: Static class method call<br>";
echo call_user_func(array("MyClassTest1", "myCallbackMethod"), "Banana");

echo "<br>----LINE:".__LINE__."----<br>";
//error_reporting(E_ALL);
/**
 * This example is from http://php.net/manual/en/function.call-user-func.php
 * However it doesn't work.
*/
echo "Basic Callback Practice 1: simply use call_user_func() function.<br> ";
function myCallbackFunction2($num)
{
    return $num * 5;
}
function myCallbackFunction3(&$num)
{
    $num = $num * 7;
}

$a = 3;
echo call_user_func('myCallbackFunction2', $a)."\n";

call_user_func_array('myCallbackFunction3', array(&$a));
echo $a;

echo "<br>----LINE:".__LINE__."----<br>";
echo "Callback comprehensive Practice 1: basic function to change letter upper or lower.<br> ";

function upperOrLower(&$str){
    $str = array(
        "u" => strtoupper($str),
        "l" => strtolower($str)
    );
}
$myName = "Caleb Chen";
upperOrLower($myName);
echo $myName['u'];

echo "<br>----LINE:".__LINE__."----<br>";
echo "Callback comprehensive Practice 2: real callback function practice.<br> ";

function stringSet($str, $callbackFunction)
{
    $result = array(
        "u" => strtoupper($str),
        "l" => strtolower($str)
    );
    if (is_callable($callbackFunction)) {
        call_user_func($callbackFunction, $result);
    }
}
stringSet('Caleb Chen',function($abc){
    echo $abc['u'];
});
/**
 * NOTE:
 * 1st shell is stringSet(), which contained two agreements: a strain and a callback function.
 * In function call_user_func(), the 2nd agreement (there is $result) feed data to 1st agreement which is a function (which is a closure function, C) contained an agreement.
 * The purpose of function C ( closure function ) is just show agreement from its parameter.
 * We can rewrite it as below.
*/

echo "<br>----LINE:".__LINE__."----<br>";
echo "Callback comprehensive Practice 3: extend test form last one.<br> ";

function stringSet2($str, $callbackFunction)
{
    $result = array(
        "u" => strtoupper($str),
        "l" => strtolower($str)
    );
    if (is_callable($callbackFunction)) {
        call_user_func($callbackFunction, $result);
    }
}
function showResort($xyz)
{
    echo $xyz['u'];
}
stringSet('Caleb Chen','showResort');


echo "<br><h1>=== Class Practice ===</h1>";
echo "----LINE:".__LINE__."----<br>";
echo "class using test.<br>";
echo MyClassTest1::myCallbackMethod("TOMATO");

echo "<br>----LINE:".__LINE__."----<br>";
echo "Using public function.<br>( You can show public method by 'MyClassTest1::myCallbackPublicFunction()' way, but in PHP 7.1 will generate an E_DEPRECATED.)<br>";
echo MyClassTest1::myCallbackPublicFunction("test");

echo "<br>----LINE:".__LINE__."----<br>";
$fooBar = new MyClassTest1();
echo $fooBar->myCallbackPublicFunction("instantiate class");
echo $fooBar->myCallbackMethod("Instantiate static method"); //it fine but not good.