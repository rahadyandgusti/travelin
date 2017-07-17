<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CitiesRequest;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class CitiesController extends CrudController
{
    protected $path = 'uploads/logo/city/original/';
	public function __construct() {
        parent::__construct();
	    $this->crud->setModel("App\Models\CitiesModel");
	    $this->crud->setRoute("admin/city");
	    $this->crud->setEntityNameStrings('City', 'Cities');

	    // $this->crud->allowAccess('reorder');
	    // $this->crud->enableReorder('title', 1);

	    $this->crud->addColumn('name');
        $this->crud->addColumn([  // Select2
                        'label' => "Province",
                        'type' => 'select',
                        'name' => 'id_province', 
                        'entity' => 'province', 
                        'attribute' => 'name', 
                        'model' => "App\Models\ProvincesModel" 
                    ]);
        $this->crud->addColumn([
            'name' => 'image',
            'label' => "Logo", // Table column heading
            'type' => "model_function",
            'function_name' => 'getImage'
            ]);

        $this->crud->addField([  // Select2
                        'label' => "Province",
                        'type' => 'select2',
                        'name' => 'id_province', 
                        'entity' => 'province', 
                        'attribute' => 'name', 
                        'model' => "App\Models\ProvincesModel" 
                    ]);
	    $this->crud->addField([
                        'name' => 'name',
                        'label' => 'Name Cities',
                        'type' => 'text',
                    ]);

	    $this->crud->addField([ // image
                        'label' => "Image Logo",
                        'name' => "logo",
                        'type' => 'image',
                        'upload' => true,
                        'crop' => true, // set to true to allow cropping, false to disable
                        'aspect_ratio' => (376/492), // ommit or set to 0 to allow any aspect ratio
                        'path' => $this->path,
                    ]);

        $this->crud->addField([ // image
                        'label' => "Image for Slide",
                        'name' => "slide",
                        'type' => 'image',
                        'upload' => true,
                        'crop' => true, // set to true to allow cropping, false to disable
                        'aspect_ratio' => (1366/500), // ommit or set to 0 to allow any aspect ratio
                        'path' => 'uploads/slide/city/',
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

    public function store(CitiesRequest $request)
    {
        $this->crud->hasAccessOrFail('create');

        $request['logo'] = $this->crud->model->uploadLogo($request->logo);
        $request['slide'] = $this->crud->model->uploadSlide($request->slide);

        // insert item in the db
        $item = $this->crud->create($request->except(['save_action', '_token', '_method']));
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // redirect the user where he chose to be redirected
        $this->setSaveAction();

        return $this->performSaveAction($item->getKey());
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

    public function update(CitiesRequest $request, $id)
    {
        $this->crud->hasAccessOrFail('update');
        
        $request['logo'] = $this->crud->model->uploadLogo($request->logo);

        $request['slide'] = $this->crud->model->uploadSlide($request->slide);

        $image = $this->crud->model->find($id)->logo;
        if($request['logo'] && $request['logo'] != $image){ 
            $this->crud->model->deleteImage($id,'logo');
        }

        $image = $this->crud->model->find($id)->slide;
        if($image && $request['slide'] && $request['slide'] != $image){ 
            $this->crud->model->deleteImage($id,'slide');
        }

        // update the row in the db
        $item = $this->crud->update($request->get($this->crud->model->getKeyName()),
                            $request->except('redirect_after_save', '_token'));
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        return \Redirect::to($this->crud->route);
    }
    
}
