<?php

declare(strict_types=1);

require_once 'I/I.php';
require_once 'I/C/C.php';
require_once 'I/C/A/A.php';
require_once 'I/C/B/B.php';

class Demo
{
    public function typeAReturnB(): B
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    //
    public function typeXReturnA(): A
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeXReturnB(): B
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeXReturnC(): C
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeXReturnI(): I
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
    public function typeXReturnNull(): ?X
    {
        echo __FUNCTION__ . "<br>";
        return null;
    }
    //
    public function typeAReturnY(): A
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeBReturnY(): B
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeCReturnY(): C
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeIReturnY(): I
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
    public function typeNullReturnY(): ?Y
    {
        echo __FUNCTION__ . "<br>";
        return null;
    }
    
}

$demo = new Demo();
$demo->typeAReturnB();
$demo->typeXReturnA();
$demo->typeXReturnB();
$demo->typeXReturnC();
$demo->typeXReturnI();
$demo->typeXReturnNull();
$demo->typeAReturnY();
$demo->typeBReturnY();
$demo->typeCReturnY();
$demo->typeIReturnY();
$demo->typeNullReturnY();



