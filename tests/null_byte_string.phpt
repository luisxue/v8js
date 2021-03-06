--TEST--
Test V8::executeString() : Pass strings with null-bytes
--SKIPIF--
<?php require_once(dirname(__FILE__) . '/skipif.inc'); ?>
--FILE--
<?php

$v8js = new V8Js();

$foo = $v8js->executeString("String.fromCharCode(65)");
var_dump($foo);

$foo = $v8js->executeString("String.fromCharCode(0)");
var_dump($foo);

$v8js->foo = $foo;
$v8js->executeString("var_dump(PHP.foo.length);");
$v8js->executeString("var_dump(PHP.foo);");


?>
===EOF===
--EXPECT--
string(1) "A"
string(1) " "
int(1)
string(1) " "
===EOF===
