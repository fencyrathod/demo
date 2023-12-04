<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CrudController extends Controller
{
    public function setup()
    {
        CRUD::setModel(\App\Models\Demo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/demo');
        CRUD::setEntityNameStrings('demo', 'demos');
    }
    public function create(){    
        return view('create');
      }
      public function store()
{
    // Perform validation, save data, etc.
    $this->crud->store();

    // Redirect back to the list view after successful submission
    return redirect($this->crud->route);
}

}
