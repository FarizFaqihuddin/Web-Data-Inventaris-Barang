<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RoleMenu;
use App\Models\Role;
use App\Models\Menu;

use App\Http\Requests\RoleMenuRequest;
use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;
class RoleMenusController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(RoleMenu $main_model){
        $this->main_model   = $main_model;
        $this->view         = 'role_menus';
        $this->title         = 'Role Menu';
        $this->validate      = 'RoleMenuRequest';
        View::share('view', $this->view);
        View::share('title', $this->title);

        $listRole   = Role::pluck('name','id');
        $listMenu   = Menu::pluck('name','id');

        View::share('listRole', $listRole);
        View::share('listMenu', $listMenu);
    }
    public function index(Request $request)
    {
        $columns = ['role.name', 'menu.name','action'];
        if($request->ajax())
        {
            $datas = $this->main_model->with(['menu','role'])->get();
            return Datatables::of($datas)
                ->addColumn('action',function($data){
                        return view('page.'.$this->view.'.action',compact('data'));
                    })
                ->escapeColumns(['actions'])
                ->make(true);
        }
        return view('page.'.$this->view.'.index')
            ->with(compact('datas','columns'));

    }

    public function store(Request $request){
        $input = $request->all();
        foreach($input['menu_id'] as $k=>$menu_id){
            $datas[$k]['role_id'] = $input['role_id'];
            $datas[$k]['menu_id'] = $menu_id;
        }
        DB::beginTransaction();
        try{
            $this->main_model->whereRoleId($input['role_id'])->delete();
            $data = $this->main_model->insert($datas);
	        DB::commit();
	    }catch(\Exception $e) {
    		DB::rollback();
    	}
        return redirect()->back();
    }


    public function create()
    {
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
		return view('page.'.$this->view.'.create')->with(compact('validator'));
    }

    // public function store(Request $request)
    // {
    //     $input = $request->all();
    // 	DB::beginTransaction();
    // 	try{
    //         $data = RoleMenu::create($input);
            
	//         DB::commit();
    //         toast()->success('Data berhasil input', $this->title);
    //         return redirect()->route($this->view.'.index');
	//     }catch(\Exception $e) {
    // 		DB::rollback();
    // 	}
    //     toast()->error('Terjadi Kesalahan', $this->title);
    //     return redirect()->back();
    // }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = $this->main_model->findOrFail($id);
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
		return view('page.'.$this->view.'.edit')->with(compact('validator','data'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = $this->main_model->findOrFail($id);
    	DB::beginTransaction();
    	try{
            $data->fill($input)->save();
	        DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view.'.index');
	    }catch(\Exception $e) {
    		DB::rollback();
    	}
        toast()->error('Terjadi Kesalahan', $this->title);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = $this->main_model->findOrFail($id);
        DB::beginTransaction();
    	try{
        	$data->delete();
        	DB::commit();
            toast()->success('Data berhasil di hapus', $this->title);
            return redirect()->route($this->view.'.index');
        }catch(\Exception $e) {
    		DB::rollback();
    	}
        toast()->error('Terjadi Kesalahan', $this->title);
        return redirect()->back();
    }
}
