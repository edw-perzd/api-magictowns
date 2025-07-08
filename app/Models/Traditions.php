<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traditions extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tradition';

    public function towns(){
        return $this->belongsToMany(Towns::class, 'tradition_town', 'id_tradition', 'id_town');
    }
}
