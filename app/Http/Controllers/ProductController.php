<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct(User $user, Product $product)
    {
        $this->module = "product";
        $this->user = $user;
        $this->data = $product;
        $this->loginUser = Auth::user();
        $this->middleware('auth');
    }
    public function index()
    {
        $module = $this->module;
        
        $allData = $this->data->orderBy('id', 'DESC')->paginate(15);
       
        return view('admin.'.$module.'.index', compact('allData','module'));
    }

    public function get_add()
    {
        $module = $this->module;

        $singleData = new Product();

        return view('admin.'.$module.'.add_edit', compact('singleData', 'module'));
    }

    public function post_add(Request $request)
    {
        $module = $this->module;

        $this->data->fill($request->all());
       
        $this->data->save();

        $dataId = $this->data->id;

        $sessionMsg = $this->data->product_name;
        return redirect('product/'.$dataId.'/view')->with('success', 'Data '.$sessionMsg.' has been created');
    }

    public function get_edit($id)
    {
        $module = $this->module;

        $singleData = $this->data->find($id);
    
        return view('admin.'.$module.'.add_edit',compact('singleData', 'module'));
    }

    public function post_edit(Request $request, $id)
    {
        $module = $this->module;

        $this->data = $this->data->find($id);
       
        $this->data->fill($request->all());
    
        $this->data->save();

        $sessionMsg = $this->data->product_name;
        return redirect('product/'.$id.'/view')->with('success', 'Data '.$sessionMsg.' has been updated');
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
