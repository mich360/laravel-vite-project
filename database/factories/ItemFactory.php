<?php
use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomNumber(4),
        'description' => $faker->sentence,
    ];
});
