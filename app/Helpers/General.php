<?php

use App\Models\Language;
use Illuminate\Support\Facades\Config;

// 🔥 Start For Unpaid 🔥 //

function getLanguages(){
    // Use Scope in Language Model
    return Language::Active() -> Selection() -> get();
}

function getDefaultLang(){
    // config/app.php
    return config::get('app.locale');
}

// config/filesystems.php
/* function uploadImage($folder, $image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
} */

function uploadVideo($folder, $video){
    $video->store('/', $folder);
    $filename = $video->hashName();
    $path = 'video/' . $folder . '/' . $filename;
    return $path;
}

// 🔥 End For Unpaid 🔥 //


// 🔥 Start For Paid 🔥 //

define('PAGINATION_COUNT', 30);

// Use in resources/views/layouts/admin.blade.php - For change page direction

function getFolder(){
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}

function uploadImage($folder,$image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    return  $filename;
}

// 🔥 End For Paid 🔥 //
