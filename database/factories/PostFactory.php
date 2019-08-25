<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Collection;


$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $title = implode(' ', $faker->words),
        'slug' => Str::slug($title),
        'body' => Collection::times(10, function () use ($faker) {
            return $faker->paragraph(5, true);
        })->join("\r\n"),
        'author' => $faker->name,
        'published_at' => $faker->dateTimeThisYear,

    ];
});
