<?php
namespace App\Http\Controller;


use Swoft\Context\Context;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use  Swoft\Http\Server\Annotation\Mapping\RequestMethod;
/**
 * 商品模块
 * @Controller(prefix="/product")
 */
class Product
{
    /**
     * @RequestMapping(route="/product",method={RequestMethod::GET})
     */
    public function prod_list()
    {
        $req = Context::mustGet()->getRequest();
        $res = Context::mustGet()->getResponse();
        return $res->withContentType("application/json")
            ->withData([NewProduct(101, "java入门")
                , NewProduct(102, "PHP入门")]);

    }

    /**
     * @RequestMapping(route="{pid}",params={"pid"="\d+"},method={RequestMethod::GET})
     */
    public function prod_detail(int $pid)
    {
        $p = NewProduct($pid, "测试商品");
        return [$p];
//        return response()->withData([$p]);
//        return response()->withContentType("application/json")->withData([$p]);
    }
}