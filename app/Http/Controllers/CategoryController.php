<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    public function category(request $request){
        $request->validate([
            'TenDM' => ['required','min:2'],
            'NgayTao' => ['required','date'],
            'MoTa' => ['required','min:2'],
        ]);
    }
    public function index(){
        $data = db::table('categorys')->select('*')->get();
        return view('admin/category/index', ['categorys'=>$data]);
    }
    public function create(){
        $TenDM = Request()->input('TenDM');
        $NgayTao = Request()->input('NgayTao');
        $MoTa = Request()->input('MoTa');
        $Danhmuc = New Category();
        $Danhmuc->TenDM= $TenDM;
        $Danhmuc->NgayTao= $NgayTao;
        $Danhmuc->MoTa= $MoTa;
        if($Danhmuc->save()){
            return redirect('category');
        }
    }
    public function edit($madm){
        $danhmucEdit = Category::find($madm);
        return view('admin/category/edit', ['category' => $danhmucEdit]);
    }
    public function update(){
        $madm = Request()->input('MaDM'); 
        $TenDM = Request()->input('TenDM');
        $NgayTao = Request()->input('NgayTao');
        $MoTa = Request()->input('MoTa');
        $danhmucUpdate = Category::find($madm);
        $danhmucUpdate->TenDM= $TenDM;
        $danhmucUpdate->NgayTao= $NgayTao;
        $danhmucUpdate->MoTa= $MoTa;
        if($danhmucUpdate->save()){
            return redirect('category');
        }
    }
    public function delete($madm){
        $danhmucDelete = Category::find($madm);
        if($danhmucDelete->delete()){
            return redirect('category');
    }  
}
public function dashboard()
{
    $user = Auth::user();
    return view('dashboard', compact('user'));
}

}