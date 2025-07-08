<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Towns extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name_town',
        'fundationDate_town',
        'declarationDate_town',
        'patronSaint_town',
        'fairDate_town'
    ];
    
    protected $primaryKey = 'id_town';

    public function adjacent(){
        return $this->belongsToMany(Towns::class, 'adjacent_towns', 'id_town', 'id_adjacentTown');
    }

    public function adjacentFrom(){
        return $this->belongsToMany(Towns::class, 'adjacent_towns', 'id_adjacentTown', 'id_town');
    }

    public function traditions(){
        return $this->belongsToMany(Traditions::class, 'tradition_town', 'id_town', 'id_tradition');
    }
}
