<?php

namespace App\Models;

use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'tel_number',
        'rest_date',
        'table_id',
        'guest_number',
    ];

    protected $dates = [
        'rest_date'
    ];

    public function table() {
        return $this->belongsTo(Table::class);
    }

}
