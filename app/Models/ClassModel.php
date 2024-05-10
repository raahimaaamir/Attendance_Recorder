<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    // Specify the table name if it's different from the default convention
    // protected $table = 'classes';

    // Define fillable columns
    protected $fillable = [
        'teacherid',
        'name',
        'starttime',
        'endtime',
        'credit_hours',
    ];
    public static function getClassIdByTeacherId($teacherId)
    {
        // Find the class associated with the given teacher ID
        $class = static::where('teacherid', $teacherId)->first();

        // If class is found, return its ID; otherwise, return null
        return $class ? $class->id : null;
    }
};