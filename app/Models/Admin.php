<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    use HasTranslations ;
 
    protected $guarded = [];
    protected $translatable =['name']; 
   
    public function hasAccess($config_permession)  // products , users , admins
    {

        $role = $this->role;

        if(!$role){
            return false;
        }

        foreach($role->permession as $permession){
            if($config_permession == $permession ?? false){
                  return true;
            }
        }

    }

}
