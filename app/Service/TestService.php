<?php
namespace App\Service;

interface TestInterface
{
    public function all();
}


//use TestInterface\TestInterface;
// 第一步 创建服务类  App\Service\TestService.php
// 第二步 php artisan  make:provider TestServiceProvider 注册服务
// 第三部 在服务提供者里面的register里面$thin->bind('/App/Service/TestInterface');
// 第四部 在config/app.php中加入服务提供者 App\Providers\TestServiceProvider::class,
// 依赖注入实例
// Laravel提供了多种依赖注入的方式。
// 首先就将实现构造器或者方法参数的注入，这种依赖注入的方式比较简单，也不需要怎么配置。
// 只要在方法的参数中写入类的类型，
// 这个时候，类的实例就会注入到这个参数上，我们在使用的时候，就可以直接使用，
// 而不用我们再去new这个类的实例，这个new的过程，已经由框架替我们做了。

class TestService  implements TestInterface
{
    //实现方法
    public function all()
    {
        return "这个是测试依赖注入的";
    }

    //测试门脸类
    public function test()
    {
        return "这是测试门脸的类";
    }
}