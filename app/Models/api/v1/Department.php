<?php

namespace App\Models\api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\api\v1\Employee;

class Department extends Model
{
    use HasFactory;

    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
    ];

    /**
     * Get the employees for the departments.
     */
    public function departments()
    {
        return $this->hasMany(Employee::class);
    }
}
