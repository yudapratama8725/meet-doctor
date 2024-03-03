<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //Deklarasi Table
    public $table = 'appointment';

    //Type Field Harus Date Contoh [yyyy-mm-dd hh-mm-&&] 
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //Deklarasi Fillable
    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    //One to Many
    public function doctor(){
        //Belongs to terdapat 3 Parameter (Path Mdoel, Field Foreign Key, Field Primary Key From Table HasMany/HasOne)
        return $this->belongsTo('App\Models\Operational\Doctor.php', 'doctor_id', 'id');
    }

    public function transaction(){
        return$this->hasOne('App\Models\Operational\Transaction.php', 'appointment_id');
    }

    public function consultation(){
        return $this->belongsTo('App\Models\MasterData\Consultation.php', 'consultation_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User.php', 'user_id', 'id');
    }
}
