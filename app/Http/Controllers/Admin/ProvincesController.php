<?php

namespace App\Http\Controllers\Admin;

use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProvincesRequest as Request;
use App\DataTables\ProvincesDatatable;
use App\Models\ProvincesModel;
use App\Forms\ProvincesForm;

class ProvincesController extends Controller
{
    protected $title = "Provinces";
    protected $url = "province";
    protected $folder = "admin.default";
    protected $form;

    public function __construct(ProvincesModel $model)
    {
        $this->model = $model;
        $this->form     = ProvincesForm::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProvincesDatatable $dataTable)
    {
        $data['title'] = $this->title;
        $data['url'] = $this->url;

        return $dataTable->render($this->folder . '.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create($this->form, [
            'method' => 'POST',
            'route' => $this->url . '.store'
        ]);

        return view($this->folder . '.form', [
            'title' => $this->title,
            'form' => $form,
            'url' => $this->url,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = $request->except(['_token', '_method','save_continue']);

        $req['logo'] = '';
        $req['created_id'] = \Auth::guard('admin')->user()->id;
        $req['updated_id'] = \Auth::guard('admin')->user()->id;

        $result = $this->model
                    ->create($req);

        $rest = $result->id;
        $save_continue = $request->get('save_continue');
        $redirect = empty($save_continue) ? route($this->url.'.index') : 
                        route($this->url.'.edit',$rest);

        if ($result) {
            return redirect()->to($redirect)
                ->with('message', 'Add Data Success');
        }

        return back()->with('error', 'Failed to add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FormBuilder $formBuilder, $id)
    {
        $data = $this->model->find($id);

        $form = $formBuilder->create($this->form, [
            'method' => 'PUT',
            'url' => route($this->url . '.update', $id),
            'model' => $data,
        ]);

        return view($this->folder . '.form', [
            'title' => $this->title,
            'form' => $form,
            'url' => $this->url,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $req = $request->except(['_token', '_method','save_continue']);

        $req['logo'] = '';
        $req['updated_id'] = \Auth::guard('admin')->user()->id;
        
        $result = $this->model->find($id)
                    ->update($req);

        $save_continue = $request->get('save_continue');
        $redirect = empty($save_continue) ? route($this->url.'.index') : 
                        route($this->url.'.edit',$id);

        if ($result) {
            return redirect()->to($redirect)
                ->with('message', 'Edit Data Successfully');
        }

        return back()->with('error', 'Failed to edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->model->find($id)->delete();

        if ($result) {
            return ['respond' => true, 'message' => 'Successfully deleted'];
        }

        return ['respond' => false, 'message' => 'Failed to delete'];
    }
}
