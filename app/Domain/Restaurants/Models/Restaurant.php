<?php

namespace App\Domain\Restaurants\Models;

use App\Domain\Employees\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->belongsToMany(Employee::class)
            ->withTimestamps();
    }

    public function isEmploymentLimitReached(): bool
    {
        return $this->employees()->count() >= $this->employment_limit;
    }
}
