<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'code','student_id','session_id','date',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function session(){
        return $this->belongsTo(Session::class);
    }
}
