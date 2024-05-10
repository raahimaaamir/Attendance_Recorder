<?php
namespace App\Models;

use Illuminate\Foundation\Auth\Attendance as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use Notifiable;

    protected $fillable = ['classid', 'studentid', 'isPresent', 'comments'];
    
}


