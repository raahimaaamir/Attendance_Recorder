<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['fullname', 'email', 'role', 'password'];
    
    public function classes()
    {
        return $this->belongsToMany(ClassModel::class);
    }
}


