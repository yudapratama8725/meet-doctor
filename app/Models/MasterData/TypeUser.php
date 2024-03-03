<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //Deklarasi Table
    public $table = 'type_user';

    //Type Field Harus Date Contoh [yyyy-mm-dd hh-mm-&&] 
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //Deklarasi Fillable
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //One to Many
    public function detail_user(){
        // Terdapat 2 Parameter (Path Mdoel, Field Foreign Key)
        return $this->hasMany('App\Models\ManagementAccess\DetailUser.php', 'type_user_id');
    }
}
