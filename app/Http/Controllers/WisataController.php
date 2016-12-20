<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProvincesRequest;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class WisataController extends CrudController
{
    protected $path = 'uploads/image/wisata/original/';
	public function __construct() {
        parent::__construct();

	    $this->crud->setModel("App\Models\WisataModel");
	    $this->crud->setRoute("admin/wisata");
	    $this->crud->setEntityNameStrings('Wisata', 'Wisata');

	    // $this->crud->allowAccess('reorder');
	    // $this->crud->enableReorder('title', 1);

	    $this->crud->addColumn('name');
	    $this->crud->addColumn([  // Select2
                        'label' => "City",
                        'type' => 'select',
                        'name' => 'id_city', 
                        'entity' => 'city', 
                        'attribute' => 'name', 
                        'model' => "App\Models\CitiesModel" 
                    ]);
        $this->crud->addColumn([
            'label' => "Logo", // Table column heading
            'type' => "model_function",
            'function_name' => 'getImage'
            ]);
        $this->crud->addColumn('description');

        $this->crud->addField([  // Select2
                        'label' => "City",
                        'type' => 'select2',
                        'name' => 'id_city', 
                        'entity' => 'city', 
                        'attribute' => 'name', 
                        'model' => "App\Models\CitiesModel" 
                    ]);
	    $this->crud->addField([
                        'name' => 'name',
                        'label' => 'Name Wisata',
                        'type' => 'text',
                    ]);

	    $this->crud->addField([ // image
                        'label' => "Image",
                        'name' => "image",
                        'type' => 'image_cropped',
                        'upload' => true,
                        'crop' => true, // set to true to allow cropping, false to disable
                        'aspect_ratio' => (1366/500), // ommit or set to 0 to allow any aspect ratio
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

        $request['image'] = $this->crud->model->uploadImage($request->image);

        // insert item in the db
        $item = $this->crud->create($request->except(['redirect_after_save', '_token']));
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // redirect the user where he chose to be redirected
        switch ($request->input('redirect_after_save')) {
            case 'current_item_edit':
                return \Redirect::to($this->crud->route.'/'.$item->getKey().'/edit');

            default:
                return \Redirect::to($request->input('redirect_after_save'));
        }
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
        $request['image'] = $this->crud->model->uploadImage($request->image);

        $image = $this->crud->model->find($id)->image;
        if($image && $request['image'] && $request['image'] != $image){ 
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
