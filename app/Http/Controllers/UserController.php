<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Service\TestService;


class UserController extends BaseController
{
    // public function __construct(TestService $test)
    // {
    //     $this->test = $test;
    // }
  
    public function getIndex(TestService $test)
    {
       return $test->all();
    }

    public function connect()
    {
        //数据库连接测试
        //    $info =  DB::select('select * from qy_cache');
        //    var_dump($info);
    }
}
