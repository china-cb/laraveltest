<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Factory;
use App\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //手动指定运行数据库填充
    // public function run()
    // {
        
    //     DB::table('articles')->insert([
    //         'title' => str_random(10),
    //         'content' => str_random(255),
    //     ]);
    // }

    // //使用模型工厂
    public function run()
    {
        factory(Article::class)->times(49)->create();
    }
}
