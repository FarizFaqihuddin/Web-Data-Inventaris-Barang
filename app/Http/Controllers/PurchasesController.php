<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;

use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Item;

use App\Exports\PurchaseExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;

class PurchasesController extends Controller
{
     use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(Purchase $main_model){
        $this->view         = 'purchases';
        $this->title        = 'Purchase';
        $this->main_model   = $main_model;
        $this->validate     = 'PurchaseRequest';
        $listItem           =  Item::pluck('name','id');

        View::share('view', $this->view);
        View::share('title', $this->title);
        View::share('listItem', $listItem);
    }

    public function index(Request $request)
    {
        $columns = ['invoice_number','purchase_date','action'];
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
        return (new PurchaseExport)->download('laporanpurchases.xlsx');
    }

    public function create()
    {
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
		return view('page.'.$this->view.'.create')->with(compact('validator'));
    }

    public function store(PurchaseRequest $request)
    {
        $input = $request->all();
    	DB::beginTransaction();
    	try{
            //General::setImage($request->file('receipt'), $this->view);
            if (!empty($request->receipt)) {
                $file = $request->file('receipt');
                $name = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/receipts'),$name);
                $input ['receipt'] = $name;
            }
            $data = $this->main_model->create($input);
            foreach ($input['item_id'] as $k => $v) {
                $input_detail['purchase_id']= $data->id;
                $input_detail['item_id']= $input['item_id'][$k];
                $input_detail['amount_purchased']= $input['amount_purchased'][$k];
                $input_detail['price']= $input['price'][$k];
                PurchaseItem::create($input_detail);
                $item       = Item::findOrFail($input['item_id'][$k]);
                $stock      = $item->stock + $input['amount_purchased'][$k];
                $update_stock['stock'] = $stock;
                $item->fill($update_stock)->save();
            }
            DB::commit();
            toast()->success('Data berhasil di Simpan', $this->title);
            return redirect()->route($this->view.'.index');
	    }catch(\Exception $e) {
            toast()->error('Terjadi Kesalahan ' . $e->getMessage(), $this->title);
    		DB::rollback();
    	}
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

    public function update(PurchaseRequest $request, $id)
    {
        $input = $request->all();
        $data = $this->main_model->findOrFail($id);
    	DB::beginTransaction();
    	try{
            //General::setImage($request->file('image'), $data->id, $this->view);
            if (!empty($request->receipt)) {
                $file = $request->file('receipt');
                $name = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/receipts'),$name);
                $input ['receipt'] = $name;
            }
            $data->fill($input)->save();
            foreach ($data->purchaseItems as $detail) {
                $item       = Item::findOrFail($detail->item_id);
                $stock      = $item->stock - $detail->amount_purchased;
                $update_stock['stock'] = $stock;
                $item->fill($update_stock)->save();
            }
            PurchaseItem::wherePurchaseId($data->id)->delete();
            foreach ($input['item_id'] as $k => $v) {
                $input_detail['purchase_id'] = $data->id;
                $input_detail['item_id'] = $input['item_id'][$k];
                $input_detail['amount_purchased'] = $input['amount_purchased'][$k];
                $input_detail['price'] = $input['price'][$k];

                PurchaseItem::create($input_detail);
                $item       = Item::findOrFail($input['item_id'][$k]);
                $stock      = $item->stock + $input['amount_purchased'][$k];
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

    public function detail()
    {
        return view('page.'. $this->view .'.detail');
    }

    public function invoicedetail($id){
        $data = $this->main_model->findOrFail($id);

        return view('page.'. $this->view .'.invoicedetail',compact('data'));
    }

/*    public function access($id){
        $data = Role::findOrFail($id);
        $menus = [];
        $data_menus = Menu::where('url', '<>', '')->get();
        foreach($data_menus as $k=>$menu){
            if(empty($menu->parent_id)){
                $menus[$menu->id]    = $menu;
            } elseif(!array_key_exists($menu->parent_id, $menus)) {
                $menus[$menu->parent_id]['head']     = $menu->parent->name;
                $menus[$menu->parent_id]['icon']     = $menu->parent->icon;
                $menus[$menu->parent_id]['detail'][] = $menu;
            } elseif(array_key_exists($menu->parent_id, $menus)) {
                $menus[$menu->parent_id]['detail'][] = $menu;
            }
        }
*/
        /*$list_role_menu = RoleMenu::whereRoleId($id)->pluck('role_id','menu_id')->toArray();
        return view('page.'.$this->view.'.role_menu')->with(compact('menus','data','list_role_menu')); */
    
}
