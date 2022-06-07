<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Setting extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    // For laravel-translatable Package

    use Translatable;

    protected $table = 'settings';

    public $timestamps = true;

    // protected $guarded = [];


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */

    // For laravel-translatable Package

    protected $with = ['translations'];

    // For laravel-translatable Package

    protected $translatedAttributes = ['value'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'key',
        'is_translatable',
        'plain_value',
        'created_at',
        'updated_at'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        // return true , false
        'is_translatable' => 'boolean',
    ];

    // *******************  Seeder ******************* //

    /**
     * Set the given settings.
     *
     * @param array $settings
     * @return void
     */

    public static function setMany($settings)
    {
        foreach ($settings as $key => $value) {
            self::set($key, $value);
        }
    }


    /**
     * Set the given setting.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */

    public static function set($key, $value)
    {
        if ($key === 'translatable') {
            return static::setTranslatableSettings($value);
        }

        // For supported_currencies Array - convert array to json_encode

        if(is_array($value)) {
            $value = json_encode($value);
        }

        static::updateOrCreate(
            ['key' => $key],
            ['plain_value' => $value]
        );
    }


    /**
     * Set a translatable settings.
     *
     * @param array $settings
     * @return void
     */

    public static function setTranslatableSettings($settings = [])
    {
        foreach ($settings as $key => $value) {
            static::updateOrCreate(
                ['key' => $key],
                [
                'is_translatable' => true,
                'value' => $value,
                ]
            );
        }
    }



    // *******************  Scope ******************* //

    // *******************  Relationship ******************* //


}
