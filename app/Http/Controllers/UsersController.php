<?php

namespace App\Http\Controllers;

//todo
use App\DataTables\UsersDatatable;
use App\Models\UsersModel;
use App\Forms\UsersForm;
use App\Http\Requests\UsersRequest;
//todo

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Kris\LaravelFormBuilder\FormBuilder;

class UsersController extends Controller
{
    protected $title    = "Pengguna";
    protected $url      = "user";
    protected $vFolder  = "page.users";
    protected $model;
    protected $form;

    public function __construct(UsersModel $model){

        $this->middleware('auth.superadmin');

        $this->model    = $model;
        $this->form     = UsersForm::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDatatable $datatable)
    {
        $data = [
            'titlePage'     => 'Menampilkan '.$this->title,
            'urlNew'        => url($this->url."/create"),
            'breadCumb' => [
                    ['link' => url('/'), 'name' => 'Home'],
                    ['link' => url('/'.$this->url), 'name' => $this->title],
                ],
        ];

        return $datatable->render($this->vFolderDefault.'.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create($this->form, [
            'method'    => 'POST',
            'route'     => $this->url . '.store',
        ]);

        $data = [
            'titlePage'     => 'Menambah ' . $this->title,
            'form'          => $form,
            'urlBack'       => url($this->url),
            'breadCumb' => [
                    ['link' => url('/'), 'name' => 'Home'],
                    ['link' => url('/'.$this->url), 'name' => $this->title],
                    ['link' => url('/'.$this->url.'/create'), 'name' => 'Tambah '.$this->title],
                ],
        ];

        return view($this->vFolderDefault . '.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $request['created_by'] = Auth::user()->id;
        $request['password'] = bcrypt($request->password);
        $result     = $this->model->create($request->except('password_confirmation'));
        $insertedId = $result->id;

        if($result)
            $session['success'][] = ['text'=>'Berhasil Menambah Data '.$this->title];
        else
            $session['error'][] = ['text'=>'Gagal Menambah Data '.$this->title];
        
        Session::flash('notif',$session);

        return redirect($this->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FormBuilder $formBuilder,$id)
    {
        $model = $this->model->find($id);

        $form = $formBuilder->create($this->form, [
            'method'    => 'PUT',
            'url'       => route($this->url . '.update', $id),
            'model'     => $model
        ]);

        $form = $form->modify('password', 'password', [
                        'attr'   => [
                            'id'    => 'password',
                            'class' => 'form-control',
                            ],
                        'value' => '',
                        'label'  => 'Password',
                    ]);

        $data = [
            'titlePage'     => 'Mengubah ' . $this->title,
            'form'          => $form,
            'urlBack'       => url($this->url),
            'breadCumb' => [
                    ['link' => url('/'), 'name' => 'Home'],
                    ['link' => url('/'.$this->url), 'name' => $this->title],
                    ['link' => url('/'.$this->url.'/'.$id.'/edit'), 'name' => 'Edit '.$this->title],
                ],
        ];
        
        return view($this->vFolderDefault . '.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        $request['updated_by'] = Auth::user()->id;

        $exception = ['password_confirmation'];
        
        if($request->password)
            $request['password'] = bcrypt($request->password);
        else
            $exception[] = 'password';

        $result     = $this->model->find($id)->update($request->except($exception));

        if($result)
            $session['success'][] = ['text'=>'Berhasil Mengubah Data '.$this->title];
        else
            $session['error'][] = ['text'=>'Gagal Mengubah Data '.$this->title];
        
        Session::flash('notif',$session);

        return redirect($this->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['deleted_by'] = Auth::user()->id;
        $data['deleted_at'] = \Carbon\Carbon::now();
        $result     = $this->model->find($id)->update($data);
        if($result)
                $respond = ['respond'=>'success','text'=>'Berhasil Menghapus Data '.$this->title];
            else
                $respond = ['respond'=>'error','text'=>'Gagal Menghapus Data '.$this->title];

        return json_encode($respond);
    }
}
