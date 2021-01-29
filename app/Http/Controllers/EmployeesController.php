<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

use App\Models\Employee;
use App\Models\Mutation;
use App\Models\Item;

use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;

class EmployeesController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(Employee $main_model){
        $this->view         = 'employees';
        $this->title        = 'Employee';
        $this->main_model   = $main_model;
        $this->validate     = 'EmployeeRequest';
        $listItem           =  Item::pluck('name','id');

        View::share('view', $this->view);
        View::share('title', $this->title);
        View::share('listItem', $listItem);
    }
	
	public function index(Request $request)
    {
		$columns = ['name','nik','action'];
        if($request->ajax())
        {
			$datas = $this->main_model->select(['*']);
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
        return (new EmployeeExport)->download('laporanemployees.xlsx');
    }
	
	public function create()
    {
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
		return view('page.'.$this->view.'.create')->with(compact('validator'));
    }
	
	public function store(EmployeeRequest $request)
    {
        $input = $request->all();
    	DB::beginTransaction();
    	try{
            $data = $this->main_model->create($input);
            DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view.'.index');
        }catch(\Exception $e) {
            DB::rollback();
        }
        toast()->error('Terjadi Kesalahan', $this->title);
        return redirect()->back();
            //General::setImage($request->file('receipt'), $this->view);
     //        $data = $this->main_model->create($input);
     //        foreach ($input['item_id'] as $k => $v) {
     //            $input_detail['employee_id']= $data->id;
     //            $input_detail['item_id']= $input['item_id'][$k];
     //            $input_detail['amount_item']= $input['amount_item'][$k];
     //            $input_detail['mutation_status']= $input['mutation_status'][$k];
     //            $input_detail['information']= $input['information'][$k];
     //            Mutation::create($input_detail);
     //            $item       = Item::findOrFail($input['item_id'][$k]);
     //            $stock      = $item->stock - $input['amount_item'][$k];
     //            $update_stock['stock'] = $stock;
     //            $item->fill($update_stock)->save();
     //        }
     //        DB::commit();
     //        toast()->success('Data berhasil di Simpan', $this->title);
     //        return redirect()->route($this->view.'.index');
	    // }catch(\Exception $e) {
     //        toast()->error('Terjadi Kesalahan ' . $e->getMessage(), $this->title);
    	// 	DB::rollback();
    	// }
     //    return redirect()->back();
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
	
	public function update(EmployeeRequest $request, $id)
    {
        $input = $request->all();
        $data = $this->main_model->findOrFail($id);
    	DB::beginTransaction();
    	try{
            //General::setImage($request->file('image'), $data->id, $this->view);
            $data->fill($input)->save();
            foreach ($data->mutations as $detail) {
                $item       = Item::findOrFail($detail->item_id);
                $stock      = $item->stock + $detail->amount_item;
                $update_stock['stock'] = $stock;
                $item->fill($update_stock)->save();
            }
            Mutation::whereEmployeeId($data->id)->delete();
            foreach ($input['item_id'] as $k => $v) {
                $input_detail['employee_id'] = $data->id;
                $input_detail['item_id'] = $input['item_id'][$k];
                $input_detail['amount_item'] = $input['amount_item'][$k];
                $input_detail['mutation_status'] = $input['mutation_status'][$k];
                $input_detail['information'] = $input['information'][$k];
               
                Mutation::create($input_detail);
                $item       = Item::findOrFail($input['item_id'][$k]);
                $stock      = $item->stock - $input['amount_item'][$k];
                $update_stock['stock'] = $stock;
                $item->fill($update_stock)->save();
            }
            DB::commit();
            toast()->success('Data berhasil Update', $this->title);
            return redirect()->route($this->view.'.index');
	    }catch(\Exception $e) {
            toast()->error('Terjadi Kesalahan ' . $e->getMessage(), $this->title);
    		DB::rollback();
    	}
        return redirect()->back();
    }
	
	public function destroy($id)
    {
        $data = $this->main_model->findOrFail($id);
        DB::beginTransaction();
    	try{
        	$data->delete();
        	DB::commit();
        	return redirect()->route($this->view.'.index');
        }catch(\Exception $e) {
    		DB::rollback();
    	}
    	Alert::error('Gagal', 'Terjadi Kesalahan');
        return redirect()->back();
    }

    public function detail($id)
    {
        $data = $this->main_model->findOrFail($id);
        return view('page.'. $this->view .'.detail',compact('data'));
    }

    public function employeedetail($id){
        $data = $this->main_model->findOrFail($id);

        return view('page.'. $this->view .'.employeedetail',compact('data'));
    }
}
