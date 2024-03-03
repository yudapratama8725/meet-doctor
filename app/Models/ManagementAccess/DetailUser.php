<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //Deklarasi Table
    public $table = 'detail_user';

    //Type Field Harus Date Contoh [yyyy-mm-dd hh-mm-&&] 
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //Deklarasi Fillable
    protected $fillable = [
        'user_id',
        'type_user_id',
        'contact',
        'address',
        'photo',
        'gender',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    //One to Many
    public function type_user(){
        //Belongs to terdapat 3 Parameter (Path Mdoel, Field Foreign Key, Field Primary Key From Table HasMany/HasOne)
        return $this->belongsTo('app\Models\MasterData\TypeUser.php', 'type_user_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User.php', 'user_id', 'id');
    }

}
