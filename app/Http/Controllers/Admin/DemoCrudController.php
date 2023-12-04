<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demo;
use App\Models\Tag;
use PDF;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class DemoCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Demo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/demo');
        CRUD::setEntityNameStrings('demo', 'demos');
    }

    public function create()
    {
        $this->setup(); 
        return view('create');
    }
    public function store(Request $request)
    {
        // CRUD::setFromDb();
        $data = new Demo();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->number = $request->number;
        if($data->save()){
            return view('/demo');

        }
    }
    public function report()
    {
        $data = Tag::get();
        return view('report',compact('data'));
    }
    public function google(){
        return view('google');
    }
    public function pdf()
    {
        $data = Tag::get();
        $pdf = PDF::loadview('pdf',["data" => $data]);
        return $pdf->stream();
    }
}
