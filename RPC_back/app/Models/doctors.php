<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctors extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    public $timestamps = false; // can remove and add update time in future

    protected $fillable = ['dname','demail','dtp', 'created_at', 'updated_at'];

}
