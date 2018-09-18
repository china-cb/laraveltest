<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\TestService;
use App;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // App::bind("TestService",function(){
        //     return new TestService();
        // });
        // $this->app->bind('TestService',function(){
        //     return new TestService(); //实例化的时候也可以加入服务的配置文件,如config('mconfig.logDriver')
        // });
        //
        $this->app->bind(
            //这里的参数可以是服务的别名
            // 'App/Service/TestInterface',
            // 'App/Service/TestService'
            'TestInterface',
            'TestService'
            
        );
    }
}
