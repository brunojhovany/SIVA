<?php

namespace App;

use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $dates = ['deleted_at'];
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
    public function UsersDescription ($request){
        $selectRaw = "U.id,U.name,U.email,U.password,U.profile,UL.level,U.jurisdiccion,J.nombreJ";
        $query = DB::table(DB::raw('users as U'));
        $query->selectRaw("$selectRaw");
        $query->leftJoin(DB::raw('(SELECT id,name AS level from userlevels) as UL'),'UL.id','=','U.profile');
        $query->leftJoin(DB::raw('(SELECT idjurisdiccion,nombreJ FROM jurisdiccion) as J'),'J.idjurisdiccion','=','U.jurisdiccion');
        $query->where('U.deleted_at',null);
        $request->has('usuario')? $query->where('U.id',$request->usuario):'';
        return $query->get();
    }
}
