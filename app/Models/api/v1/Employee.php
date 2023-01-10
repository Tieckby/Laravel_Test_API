<?php

namespace App\Models\api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\api\v1\Department;

use Illuminate\Foundation\Auth\Employee as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory, HasApiTokens;

    public $timestamps = false;

    protected $table = "employees";

    // The attributes that are mass assignable.
    protected $fillable = [
        'fullName',
        'username',
        'email',
        'phoneNumber',
        'email_verified',
        'password',
        'enabled'
    ];

    // guarded is The inverse of fillable (Blocking id From Mass Assignment).
    protected $guarded = ['id'];

    // The attributes that should be hidden for serialization.
    protected $hidden = [
        'password'
    ];

    /**
     * Get the department where is the employee.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
