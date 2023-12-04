<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TestRequest;
use App\Models\Demo;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Test::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/test');
        CRUD::setEntityNameStrings('test', 'tests');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // $this->crud->addFilter([
        //     'type' => 'text',
        //     'name' => 'description',
        //     'label'=> 'Description'
        //   ], 
        //   false, 
        //   function($value) { // if the filter is active
        //      $this->crud->addClause('where', 'name', 'LIKE', "%$value%");
        //   });
        CRUD::setFromDb(); // set columns from db columns.
         CRUD::column('name')->type('text');
         CRUD::column('email')->type('email');
         CRUD::column('number')->type('varchar');
         CRUD::addColumn(['name' => 'gender']); 
         CRUD::addColumn(['name' => 'date']);   
    }
    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(TestRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        
        $this->crud->addField([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'radio',
            'options' => ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'],
            'inline' => true
            // other configuration options...
        ]);
        CRUD::addfield([  
            'name'  => 'date',
            'label' => 'Birthday',
            'type'  => 'date',
        ]);
        CRUD::field([   // select_from_array
            'name'        => 'template',
            'label'       => "Template",
            'type'        => 'select_from_array',
            'options'     => ['one' => 'One', 'two' => 'Two', 'three' => 'Three'],
            'allows_null' => false,
            'default'     => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        CRUD::field([   // Upload
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload_multiple',
            'withFiles' => true
            ]);
            $service_type = [ // Select
                'label' => "Service Type",
                'type' => 'select',
                'name' => 'Service_Type',
                'entity' => 'check_services',
                'model' => "App\Models\Demo",
                'attribute' => 'name',
                'allows_null' => true,
                'wrapper' => [
    
                    'class' => 'col-md-3',
                ],
    
            ];
    
            $this->crud->addField($service_type);
            
        // CRUD::addfield([
        //     'name'  => 'featured', // The db column name
        //     'label' => 'Featured', // Table column heading
        //     'type'  => 'switch'
        // ]);
      
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    public function demo()
    {
        return view('demo');
    }
   
}
