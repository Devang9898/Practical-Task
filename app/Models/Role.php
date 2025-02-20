<?php
// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Role extends Model
// {
//     protected $fillable = ['name', 'slug'];

//     public function users()
//     {
//         return $this->belongsToMany(User::class);
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];
    protected $table = 'new_roles';
    

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function hasPermission($permission)
    {
        return $this->roles->flatMap->permissions->pluck('name')->contains($permission);
    }
}