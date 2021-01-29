<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;

use App\Models\Item;
use App\Models\Category;
use App\Models\Brand;
use App\Models\PurchaseItem;

use App\Exports\ItemExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;

class ItemsController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(Item $main_model){
        $this->view         = 'items';
        $this->title        = 'Item';
        $this->main_model   = $main_model;
        $this->validate     = 'ItemRequest';
		View::share('view', $this->view);
        View::share('title', $this->title);

		$listCategory   = Category::pluck('name','id');
		$listBrand      = Brand::pluck('name','id');

		View::share('listCategory', $listCategory);
        View::share('listBrand', $listBrand);
	}
	
	public function index(Request $request)
    {
		$columns = ['category.name', 'brand.name','name','stock','action'];
        if($request->ajax())
        {
			$datas = $this->main_model->with(['category','brand'])->get();
            return Datatables::of($datas)
                ->addColumn('action',function($data){
                        return view('page.'.$this->view.'.action',compact('data'));
                    })
                ->escapeColumns(['actions'])
                ->make(true);
        }
     	return view('page.'.$this->view.'.index')
			->with(compact('columns'));
			
	}
 
    public function laporanExcel()
    {
        return (new ItemExport)->download('laporanitems.xlsx');
    }

	public function create()
    {
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
		return view('page.'.$this->view.'.create')->with(compact('validator'));
    }
	
	public function store(ItemRequest $request)
    {        
        $input = $request->all();
    	DB::beginTransaction();
    	try{
            if (!empty($request->picture)) {
                $file = $request->file('picture');
                $name = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/items'),$name);
                $input ['picture'] = $name;
            }
            $data = $this->main_model->create($input);
	        DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view.'.index');
	    }catch(\Exception $e) {
    		DB::rollback();
    	}
        toast()->error('Terjadi Kesalahan', $this->title);
        return redirect()->back();
    }
	
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
	
	public function update(ItemRequest $request, $id)
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

    public function detail($id){
        $data = $this->main_model->findOrFail($id);
        
        return view('page.'.$this->view.'.detail',compact('data'));
    }

    // public function dashboard()
    // {
    //     $datas = $this->main_model->where('category_id','$val')->count()->get();

    //     return view('page.'.$this->view.'.dashboard');
    // }

}