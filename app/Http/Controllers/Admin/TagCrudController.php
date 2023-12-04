<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use Backpack\CRUD\app\Library\Widget;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TagCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TagCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Tag::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tag');
        CRUD::setEntityNameStrings('tag', 'tags');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.
        // CRUD::addColumn(['name' => 'action',
        // 'type' => 'view',
        // 'view' => "button"]);
        

        CRUD::addButtonFromModelFunction('top', 'open_google', 'openGoogle', 'end');
        // CRUD::addButtonFromModelFunction('line', 'open_google', 'openGoogle', 'end');
        CRUD::addButtonFromModelFunction('top','Reports', 'Reports', 'end');
        CRUD::addButtonFromModelFunction('bottom','Select','user');
        CRUD::addButtonFromModelFunction('top','PDF','pdf','end');

        // CRUD::addButtonFromModelFunction('bottom', 'open_google', 'openGoogle', 'beginning');


        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(TagRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        CRUD::addfield([  
            'name'  => 'name',
            'label' => 'Name',
            'type'  => 'text',
        ]);

        CRUD::addfield([  
            'name'  => 'email',
            'label' => 'Email',
            'type'  => 'email',
        ]);

            CRUD::field('number')->type('number');
            // CRUD::field([
            //     'name'      => 'profile_image', // The db column name
            //     'label'     => 'Profile image', // Table column heading
            //     'type'      => 'image',
            // ]);

            // CRUD::addfield([
            //     'name' => 'gedner',
            //     'label' => 'gender',
            //     'type' => 'radio',
            //     'options' => ['male' => 'Male', 'female' => 'Female'],
            // 'inline' => true
            // ]);
            // CRUD::field('address')->type('text');
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
    public function setupShowOperation()
    {
          
    }
}
