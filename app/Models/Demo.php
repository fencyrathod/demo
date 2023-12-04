<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table = 'demos';
    public $timestamps = false;
    protected $guarded = ['id'];
}
