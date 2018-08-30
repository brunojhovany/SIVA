<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function level (){
        return $this->hasOne('App\userlevels','id');
    }
    public function UsersDescription (){
        $selectRaw = "U.id,U.name,U.email,U.profile,UL.level,U.jurisdiccion";
        $query = DB::table(DB::raw('users as U'));
        $query->selectRaw("$selectRaw");
        $query->leftJoin(DB::raw('(SELECT id,name AS level from userlevels) as UL'),'UL.id','=','U.profile');
        return $query->get();
    }
}
