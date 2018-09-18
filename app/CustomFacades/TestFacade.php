<?php
namespace App\CustomFacades;

use Illuminate\Support\Facades\Facade;
use App\Service\TestService;
class TestFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        //必须是已经注册的服务提供者的别名,包含命名空间的完整服务类名
        return 'App\Service\TestService';
    }

    protected static function getIndex($str)
    {
        return '这是实时门面';
    }
}