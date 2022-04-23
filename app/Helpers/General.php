<?php

use App\Models\Language;
use Illuminate\Support\Facades\Config;

function getLanguages(){

    // Use Scope in Language Model
    return Language::Active() -> Selection() -> get();

}

function getDefaultLang(){

    return config::get('app.locale');

}
