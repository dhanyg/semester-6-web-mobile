<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'description',
        'date'
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2'
    ];

    public static function getTotalThisMonth()
    {
        return self::whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->sum('amount');
    }

    public static function getTotalToday()
    {
        return self::whereDate('date', Carbon::today())->sum('amount');
    }
}
