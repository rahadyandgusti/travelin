<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProvincesRequest;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class ProvincesController extends CrudController
{
    protected $path = 'uploads/logo/province/original/';
	public function __construct() {
        parent::__construct();

	    $this->crud->setModel("App\Models\ProvincesModel");
	    $this->crud->setRoute("admin/province");
	    $this->crud->setEntityNameStrings('Province', 'Provinces');

	    // $this->crud->allowAccess('reorder');
	    // $this->crud->enableReorder('title', 1);

	    $this->crud->addColumn('name');
        $this->crud->addColumn([
            'name' => 'image',
            'label' => "Logo", // Table column heading
            'type' => "model_function",
            'function_name' => 'getImage'
            ]);

	    $this->crud->addField([
                        'name' => 'name',
                        'label' => 'Name Province',
                        'type' => 'text',
                    ]);

	    $this->crud->addField([ // image
                        'label' => "Image",
                        'name' => "logo",
                        'type' => 'image',
                        'upload' => true,
                        'crop' => true, // set to true to allow cropping, false to disable
                        'aspect_ratio' => (992/1104), // ommit or set to 0 to allow any aspect ratio
                        'path' => $this->path,
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
        $this->crud->hasAccessOrFail('create');

        $request['logo'] = $this->crud->model->setImageAttributeEdit($request->logo);

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

    public function update(ProvincesRequest $request, $id)
    {
        $this->crud->hasAccessOrFail('update');
        
        // return str_replace(url('/').'/', '', $request->logo);
        $request['logo'] = $this->crud->model->setImageAttributeEdit($request->logo);

        $image = $this->crud->model->find($id)->logo;
        if($image && $request['logo'] && $request['logo'] != $image){ 
            $this->crud->model->deleteImage($id);
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
