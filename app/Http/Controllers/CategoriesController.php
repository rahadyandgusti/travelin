<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProvincesRequest;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class CategoriesController extends CrudController
{
    protected $path = 'uploads/image/wisata/big/';
	public function __construct() {
        parent::__construct();

	    $this->crud->setModel("App\Models\CategoriesModel");
	    $this->crud->setRoute("admin/categories");
	    $this->crud->setEntityNameStrings('Category', 'Categories');

	    // $this->crud->allowAccess('reorder');
	    // $this->crud->enableReorder('title', 1);

	    $this->crud->addColumn('name');
        $this->crud->addColumn('description');

	    $this->crud->addField([
                        'name' => 'name',
                        'label' => 'Name Wisata',
                        'type' => 'text',
                    ]);
    
        $this->crud->addField([
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'wysiwyg',
                    ]);
	}

	public function create()
    {
        $this->crud->addField([
                        'name' => 'created_id',
                        'default' => \Auth::user()->id,
                        'type' => 'hidden',
                    ]);

        return parent::create();
    }

    public function store(ProvincesRequest $request)
    {
        return parent::storeCrud();
    }

    public function edit($id)
    {
        $this->crud->addField([
                        'name' => 'updated_id',
                        'default' => \Auth::user()->id,
                        'type' => 'hidden',
                    ]);

        return parent::edit($id);
    }

    public function update(ProvincesRequest $request, $id)
    {
        return parent::updateCrud();
    }
}
