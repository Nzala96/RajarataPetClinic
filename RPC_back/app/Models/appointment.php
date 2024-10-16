<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    public $timestamps = false; // can remove and add update time in future

    protected $fillable = ['name','email','date','petname','docname','message', 'created_at', 'updated_at'];

}
