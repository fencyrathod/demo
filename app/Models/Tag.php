<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'tag';
    // protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function openGoogle($crud = false)
    {
        return '<a class="btn btn-sm btn-link" href="google"><i class="la la-search"></i> Google</a>';
    }
    public function Reports()
    {
        return '<a href="reports" class="btn btn-sm btn-link"><i class="la la-book"></i> Report</a>';
    }
    public function user(){
        return '<a class="btn btn-primary" style="width:80px;" href="reports">USER</a>';
    }
    public function pdf()
    {
        return '<a class="btn btn-sm btn-link" href="pdf"><i class="la la-file-pdf"></i>Pdf</a>';
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
