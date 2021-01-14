<?php
/**
 * Custom global functions
 */

function response($contentType=false)
{
    if($contentType){

        return Swoft\Context\Context::mustGet()->getResponse()->withContentType($contentType);
    }
    return Swoft\Context\Context::mustGet()->getResponse();
}

function request()
{
    return Swoft\Context\Context::mustGet()->getRequest();
}

function NewProduct(int $pid, string $pname)
{
    $p = new stdClass();
    {
        $p->pid    = $pid;
        $p->$pname = $pname . $p->pid;
    }
    return $p;
}