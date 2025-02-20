<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPermission extends Model {
    protected $fillable = [
        'name', 
        'guard_name'
    ];

    public function roles() {
        return $this->belongsToMany(CustomRole::class, 'custom_permission_custom_role');
    }
}
