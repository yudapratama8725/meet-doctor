<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialist extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //Deklarasi Table
    public $table = 'specialist';

    //Type Field Harus Date Contoh [yyyy-mm-dd hh-mm-&&] 
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //Deklarasi Fillable
    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //One to Many
    public function doctor(){
        // Terdapat 2 Parameter (Path Mdoel, Field Foreign Key)
        return $this->hasMany('app\Models\Operational\Doctor.php', 'specialist_id');
    }
}
