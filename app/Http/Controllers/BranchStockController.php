<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use App\Models\BranchStock;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BranchStockController extends Controller
{
    public function __construct(User $user, BranchStock $branch_stock)
    {
        $this->module = "branch_stock";
        $this->user = $user;
        $this->data = $branch_stock;
        $this->loginUser = Auth::user();
        $this->middleware('auth');
    }
    public function index()
    {
        $module = $this->module;
        
        $allData = DB::table('branch_stocks As bs')
                ->join('branches As br','br.id', 'bs.branch_id')
                ->join('users As u', 'u.id', 'bs.user_id')
                ->join('products', 'products.id', 'bs.product_id')
                ->select([
                    'bs.id',
                    'u.name',
                    'products.product_name',
                    'br.branch_name',
                    'bs.remaining_qty'
                ])->orderBy('id', 'DESC')->paginate(15);
       
        return view('admin.'.$module.'.index', compact('allData','module'));
    }

    public function get_add()
    {
        $module = $this->module;
        $userData = User::pluck('name','id');
        $branchData = Branch::pluck('branch_name','id');
        $productData = Product::pluck('product_name','id');
        $singleData = new BranchStock();

        return view('admin.'.$module.'.add_edit', compact('singleData', 'module','userData','branchData','productData'));
    }

    public function post_add(Request $request)
    {
        $module = $this->module;

        $this->data->fill($request->all());
        $this->data->user_id =  Auth::user()->id;
        $this->data->save();

        $dataId = $this->data->id;

        $sessionMsg = 'branch_stock';
        return redirect('branch_stock/')->with('success', 'Data '.$sessionMsg.' has been created');
    }

    public function get_edit($id)
    {
        $module = $this->module;
        $userData = User::pluck('name','id');
        $branchData = Branch::pluck('branch_name','id');
        $productData = Product::pluck('product_name','id');
        $singleData = $this->data->find($id);
    
        return view('admin.'.$module.'.add_edit',compact('singleData', 'module','userData','branchData','productData'));
    }

    public function post_edit(Request $request, $id)
    {
        $module = $this->module;

        $this->data = $this->data->find($id);
       
        $this->data->fill($request->all());
        $this->data->user_id =  Auth::user()->id;
        $this->data->save();

        $sessionMsg = 'branch_stock';
        return redirect('branch_stock/')->with('success', 'Data '.$sessionMsg.' has been updated');
    }

    public function get_view($id)
    {
        $module = $this->module;

        $singleData = $this->data->find($id);

        return view('admin.'.$module.'.view',compact('singleData', 'module'));
    }

    public function get_delete($id)
    {
        $module = $this->module;

        if($this->data->where('id', $id)->first()->forceDelete()) {
        
            return redirect()->back()->with('success', 'Your data has been permanently deleted');
        }else {
            return redirect()->back()->with('error', 'Your data has not been permanently deleted.');
        }
    }
}
