<?php

namespace App\Http\Enumerations;

// https://github.com/spatie/laravel-enum

use Spatie\Enum\Laravel\Enum;


final class CategoryType extends Enum
{
    const mainCategory = 1;
    const subCategory = 2;

}
