<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model
{
    use HasFactory;

    protected $table = 'attribute_translations';

    public $timestamps = true;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // protected $fillable = ['name', 'description', 'short_description'];

    // *******************  Scope ******************* //

    // *******************  Relationship ******************* //
}
