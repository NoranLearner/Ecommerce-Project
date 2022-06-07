<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'languages';

    public $timestamps = true;

    // protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'abbr',
        'locale',
        'name',
        'direction',
        'active',
        'created_at',
        'updated_at'
    ];

    // *******************  Scope ******************* //

    // Get Active Languages
    public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function scopeSelection($query){
        return $query -> select('id', 'abbr','name', 'direction', 'active');
    }

    public function getActive(){
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

}
