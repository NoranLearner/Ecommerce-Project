<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\UserVerificationCode;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        // 'email',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
    ];

    // *******************  Scope ******************* //

    // *******************  Relationship ******************* //

    public function codes() {
        return $this -> hasMany(UserVerificationCode::class,'user_id');
    }

    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlists')->withTimestamps();
    }

    public function wishlistHas($productId)
    {
        return self::wishlist()->where('product_id', $productId)->exists();
    }
}
