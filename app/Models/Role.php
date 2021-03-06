<?php 
namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    // 定义用户组和角色的多对多关系
    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }

}