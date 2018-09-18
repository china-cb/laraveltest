<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Service\TestService;

class TestController extends BaseController
{
    public function __construct(TestService $test)
    {
        $this->test = $test;
    }
  
    public function getIndex(TestService $test)
    {
       return $test->all();
    }
}
