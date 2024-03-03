<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //Deklarasi Table
    public $table = 'role_user';

    //Type Field Harus Date Contoh [yyyy-mm-dd hh-mm-&&] 
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //Deklarasi Fillable
    protected $fillable = [
        'role_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User.php', 'user_id', 'id');
    }
}
