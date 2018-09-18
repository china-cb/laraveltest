<?php

use Faker\Generator as Faker;


$factory->define(\App\Article::class,function(\Faker\Generator $faker){
    return [
        'title' => str_random(10),
        'content' => str_random(255),
    ];
});