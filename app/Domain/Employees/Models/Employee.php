<?php

namespace App\Domain\Employees\Models;

use App\Domain\Restaurants\Models\Restaurant;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected static function boot()
    {
        static::creating(function (Employee $model) {
            $model->workplace_limit = config('config.employee.default_workplace_limit');
        });
        parent::boot();
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class)
            ->withTimestamps();
    }

    public function isWorkplaceLimitReached(): bool
    {
        return $this->restaurants()->count() >= $this->workplace_limit;
    }

    protected static function newFactory()
    {
        return new EmployeeFactory();
    }
}
