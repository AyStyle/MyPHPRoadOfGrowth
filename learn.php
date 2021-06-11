<?php

// 单行注释
# 单行注释
/*
 * 多行注释
 */

/**
 * 文档注释
 */


?>

<?php
// PHP中的变量类型是弱类型
// 变量声明时，由$开头后面可跟字母数字下划线，但是数字不能开头
$person = 'ankang';
var_dump($person);
$person = 123;
var_dump($person);
?>

<?php
$a = 1;
$b = $a;
$b = 3;
echo $a;
echo $b;
?>

<?php
echo "第四段----------------\n";
$a = 1;
// &会将指针指向$a指向的指针
$b = &$a;
$b = 3;
echo $a;
echo $b;
?>

<?php
echo "可变变量-------------------------\n";
$name = 'word';
$$name = '可变变量';
echo $name;
echo $$name;
?>

<?php
echo "变量作用域-------------------\n";
$name = "ankang";
var_dump($_GET);
function show()
{
    // global关键与$GLOBAL都是引用全局变量的
    global $name;
    echo $GLOBALS['name'];
    echo "\n";
    echo $name;
}

show();
?>

<?php
echo "变量检测与变量删除-----------\n";
// 检测变量是否存在：isset
var_dump(isset($ankang));
$ankang = "ankang";
var_dump(isset($ankang));

// 删除变量：unset。全局变量无法删除，但是可以执行操作
echo "delete var ...\n";
unset($ankang);
var_dump(isset($ankang));
?>

<?php
echo "static 静态变量------------------\n";
function make()
{
    // 被static修饰的变量，只有第一次调用的时候回执行，后面的多次调用都不会执行
    // 可以用来加载首次记录
    static $sum = 1;
    $sum++;

    return $sum;
}

var_dump(make());
var_dump(make());
var_dump(make());

?>

<?php
echo "整数与浮点数，8进制和16进制转换--------------\n";

/**
 * integer
 * float
 * string
 * array
 * object
 * boolean
 */

// 8进制转换
echo octdec("777");
echo "\n";
// 16进制转换
echo hexdec("FAF");

?>

<?php
echo "Boolean类型---------------------\n";
// 不区分大小写
var_dump(true);
var_dump(FALSE);

// 对于数字：非0即True
var_dump(0 == false);
var_dump(0.0 == false);
var_dump(1 == true);

// 对于字符串：非空即True
var_dump("" == False);
var_dump("  " == true);
var_dump("aaa" == true);

// 对于对象只有null是false
var_dump(null == false);

// 空数组是false
var_dump([] == false);
?>

<?php
echo "字符串定义与响应头header设置---------------------\n";
// 定义字符串双引号和单引号没什么区别，但是双引号可以引用变量
$name = '安康';

// 设置中文编码
ob_start();
header('Content-type:text/html;charset=utf-8');


echo "\nmy name is ${name}\n";
?>

<?php
echo "字符串定界符---------------------------\n";

$str = <<<EOF
定界符开始
定界符内的内容
定界符结束
EOF;

echo $str;

echo "\n字符串的拼接----------------------\n";
echo "字符串的拼接，使用" . "符号 . " . "即可\n";

// 获取字符串长度
// strlen，返回字节的长度
echo $name . '-strlen:' . strlen($name) . "\n";

// mb_strlen，返回字符串长度，最好带上编码
echo $name . "-mb_strlen: " . mb_strlen($name, "utf-8") . "\n";

// trim，去除字符串两遍的空格
$empty_str = "   ";
echo "no trim: " . strlen($empty_str) . ", trim: " . strlen(trim($empty_str)) . "\n";

$str = "https://www.baidu.com/ankang";
echo trim($str, 'sgthp') . "\n";

// strtolower字符串转小写，strtoupper字符串转大写

// ucwords单词首字母大写，ucfirst第一个字符大写
$hello_word = 'hello world';
echo ucwords($hello_word) . "\n";
echo ucfirst($hello_word) . "\n";

// md5计算字符串md5
echo md5("a") . "\n";

// explode，拆分字符串
$explode = explode('.', 'https://www.baidu.com');
print_r($explode);

// implode，合并字符串
$implode_arr = ['ankang04@baidu', 'com'];
$implode = implode('.', $implode_arr);
print_r($implode);
echo "\n";

// substr，截取字符串
$substr = substr($implode, 0, -4);
print_r($substr);

?>

<?php
echo "常量----------------------\n";

// 通过define定义常量
define("NAME", '安康康');

// 通过const定义常量
const AGE = 18;
?>

<?php
echo "三元表达式-----------------------------\n";

// 语法：condition ? true : false
echo true ? "true\n" : "false\n";
echo false ? "true\n" : "false\n";

$value = "has_value";
echo $value ? "${value}\n" : "null\n";
$value = "";
echo $value ? "${value}\n" : "null\n";

echo "------\n";

// 特殊语法
// condition ?: false 当condition为true时，返回condition，为false时返回false
// condition ?? false 当condition存在且不为null时，返回condition，否则返回false
$value = null;
unset($value);
echo $value ?? "?? false\n";

?>

<?php
echo "错误屏蔽--------------------------\n";
echo @(100 / 0) . " with @ \n";
echo (100 / 0) . " no with @ \n";
echo "finish \n"

?>

<?php
echo "if 条件语句-----------------\n";
// 语法1
$status = false;
$age = 18;
if ($status) {
    echo "条件为真\n";
} elseif ($age) {
    echo "其他条件\n";
} else {
    echo "条件为假\n";
}

// 语法2
if ($status):
    echo '';
elseif ($age):
    echo '';
else:
    echo '';
endif;
?>

<?php
echo "switch 语句-----------------\n";
$status = "";
switch ($status) {
    case 'success':
        echo "success\n";
        break;
    case 'failed':
        echo "failed\n";
        break;
    case 'error':
        echo "error\n";
        break;
    default:
        echo 'default\n';
        break;
}

?>

<?php
echo "while 语句-----------------\n";
$status = "";
// 语法1
while ($status) {
    echo "while 语句-----------------\n";
}

// 语法2
while ($status):
    echo "while 语句-----------------\n";
endwhile;

echo "do  while 语句-----------------\n";
do {
    echo "do  while 语句-----------------\n";
} while ($status);

echo "for 语句-----------------\n";
for ($num = 0; $num < 100; $num++) {
    echo "for ${num}\n";
}

?>

<?php
echo "break 和 continue 语句-----------------\n";
// break跳出语句，后面可跟数字，代表跳出几层
// continue跳过当前，执行下一个
?>

<?php
echo "文件引入 include和require-----------------\n";
// include
$filepath = '';
// 文件不存在也会往下执行，不会报错
// include $filepath;

// require 文件必须存在，不存在则会报错
// require $filepath;

// include_once 文件只加载一次，其余与include相同

// require_once 文件只加载一次，其余与require相同
?>

<?php
echo "函数-----------------\n";
function user()
{
    // 函数一定会有返回值，不写默认返回null
    return 'value';
}

?>

<?php
echo "命名空间--------------------\n";
include_once 'Model.php';
Model\make();

?>

<?php
echo "函数----------------\n";
// 变量名前面加&代表传址
function f($var)
{
    echo ++$var . "\n";
}

$var = 1;

echo $var . "\n";
f($var);
echo $var . "\n";


function sum($var1, $var2 = 5)
{
    return $var1 + $var2;
}

$var1 = 1;
$var2 = 2;
echo sum($var1, $var2) . "\n";
echo sum($var1) . "\n";

function sum_many(...$vars)
{
    return array_sum($vars);
}

echo sum_many($var, $var1, $var2) . "\n";

?>

<?php
echo "函数的类型约束------------------\n";
// declare(strict_types = 1); 这条语句必须写到第一行
// 参数约束：在参数前写明变量类型
// 返回值约束：在方法圆括号后面使用“:”，然后跟变量类型；如果返回类型前面有“?”说明可以返回null；如果没有返回值可以写void
function declareFunc(int $num): ?int
{
    return $num;
}

echo declareFunc('1') . "\n";
?>

<?php
echo "变量的作用范围--------------------------------------\n";
$name = '安康';
function showName()
{
    global $name;
    echo $name . "\n";
    //   echo  $GLOBALS['name']."\n";
}

showName();


function staticShowName()
{
    static $name = "";
    $name = $name . $GLOBALS['name'];
    echo $name . "\n";
}

staticShowName();
staticShowName();
staticShowName();
?>

<?php
echo "变量函数--------------------------------------\n";
function variableSum()
{
    echo 'variableSum Function' . "\n";
}

$callable = 'variableSum';

$callable();

?>

<?php
echo "数组--------------------------------------\n";
// $arr = Array();
$arr = [0 => 1, 1 => 2, 2 => 3,];
echo $arr[1] . "\n";
$arr = ['name' => 'ankang', 'age' => 18];
echo $arr['name'] . "\n";
echo $arr['age'] . "\n";

// key()可以获取当前数组指针对应的key
// current()可以获取当前数组指针对应的value
// next()切换当前数组的指针为下一个，同时返回value

?>

<?php
echo "list与foreach--------------------------------------\n";
$arr = ['安康', 18];
list($a, $b) = $arr;

echo "${b}\n";

$arr = ['name' => '安康', 'age' => 18];
list('name' => $c, 'age' => $d) = $arr;
echo "${c}\n";

// foreach
foreach ($arr as $key => $val) {
    echo "$key ==> $val\n";
}

?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
<?php echo "--------------------------------------\n"; ?>
