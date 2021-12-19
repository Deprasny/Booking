<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table = 'sessions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'day','session','from','to','quota','filled',
    ];
    
    public function booking(){
        return $this->hasMany(Booking::class);
    }

}
