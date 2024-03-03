<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //Deklarasi Table
    public $table = 'doctor';

    //Type Field Harus Date Contoh [yyyy-mm-dd hh-mm-&&] 
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //Deklarasi Fillable
    protected $fillable = [
        'specialist_id',
        'name',
        'fee',
        'photo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    //One to Many
    public function specialist(){
        //Belongs to terdapat 3 Parameter (Path Mdoel, Field Foreign Key, Field Primary Key From Table HasMany/HasOne)
        return $this->belongsTo('app\Models\MasterData\Specialist.php', 'specialist_id', 'id');
    }

    public function appointment(){
        return $this->hasMany('App\Models\Operational\Appointment.php', 'doctor_id');
    }
}
