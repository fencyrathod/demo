<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User_demoRequest;
use App\Models\User_demo;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(\App\Models\User_demo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/User_demo');
        CRUD::setEntityNameStrings('User_demo', 'User');
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
        CRUD::addButtonFromModelFunction('top', 'open_google', 'openGoogle', 'end');
    }
    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(User_demoRequest::class);
        CRUD::setFromDb(); 
        $name = [ 
            'label' => "Name",
            'type' => 'text',
            'name' => 'name',
            // 'entity' => 'check_services',
            // 'model' => "App\Models\User",
            'attribute' => 'name',
            'allows_null' => true,
            'wrapper' => [
                'class' => 'col-md-12',
            ],
        ];

        $this->crud->addField($name);

        CRUD::addfield([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
        ]);

        CRUD::addfield([
            'name' => 'number',
            'label' => 'Number',
            'type' => 'number',
        ]);

        CRUD::addfield([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'radio',
            'options' => ['male' => 'Male', 'female' => 'Female'],
            'inline' => true
        ]);

        CRUD::addfield([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'summernote',
        ]);

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
  
   
}
