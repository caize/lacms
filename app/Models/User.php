<?php

namespace App\Models;

use App\Role;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;



class User extends Model
{
    use entrustusertrait;

    protected $guarded = [];

    // 定义用户组和角色的多对多关系
    public function roles(){
        return $this->belongstomany(role::class);
    }
}
