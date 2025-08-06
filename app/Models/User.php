<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     public function receivesBroadcastNotificationsOn(): string
{
    return 'user.' . $this->id;
}
public function orders(){
    return $this->hasMany(Order::class,'user_id');
}
    protected $guarded = [];
    // public function wishlist(){
    //     return $this->hasMany(Wishlists::class,'user_id');
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
     public function perview(){
        return $this->hasMany(Produect_previews::class,'user_id');
    }
    public function goverment(){
        return $this->belongsTo(Governreate::class,'governorate_id');
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function wishlist(){
          return $this->belongsToMany(Broduct::class,'wishlists','user_id','produect_id',);  
    }
public function cart(){
   return $this->hasMany(Cart::class,'user_id') ;
}

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
