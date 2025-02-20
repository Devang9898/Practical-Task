<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomRole extends Model {
    protected $fillable = [
        'name', 
        'guard_name'
    ];

    public function permissions() {
        return $this->belongsToMany(CustomPermission::class, 'custom_permission_custom_role');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'custom_role_user');
    }
}
