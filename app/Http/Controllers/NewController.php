<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class NewController extends Controller
{
    public function valit(Request $request){
       $request->validate([
            'ten' => ['required', 'min:2'],
            'ngaysinh' => ['required', 'date'],
            'sdt' => ['required', 'integer', 'min:10', 'max:11'],
            'email' => ['email', 'ends_with:@gmail.com']
       ]);
     }
     public function show($matt)
     {
         $news = News::findOrFail($matt);
         $comments = DB::table('comments')->where('id_news',$matt)->get();
         return view('user.newct', ['news'=>$news, 'comments'=>$comments]);
     }


    public function index(){
     $data = db::table('news')->select('*')->get();
     return view('admin/new/index', ['news'=>$data]);
    }


    // public function demo($madm){
    //     $danhmucEdit = Category::find($madm);
    //     return view('admin/demo', ['categorys' => $danhmucEdit]);
    // }


    public function create(){
     $TenTT = Request()->input('TenTT');
     $HinhAnh = Request()->input('HinhAnh');
     $NgayTao = Request()->input('NgayTao');
     $MoTa = Request()->input('MoTa');
     $MaDM = Request()->input('MaDM');
     $TinTuc = New News();
     $TinTuc->TenTT= $TenTT;
     $TinTuc->HinhAnh= $HinhAnh;
     $TinTuc->NgayTao= $NgayTao;
     $TinTuc->MoTa= $MoTa;
     $TinTuc->MaDM= $MaDM;
     if($TinTuc->save()){
         return redirect('new');
     }
 }
 public function edit($matt)
    {
        $new = News::findOrFail($matt);
        $categories = Category::all();
        return view('admin.new.edit', compact('new', 'categories'));
    }
 public function update(){
     $matt = Request()->input('MaTT');
     $TenTT = Request()->input('TenTT');
     $NgayTao = Request()->input('NgayTao');
     $MoTa = Request()->input('MoTa');
     $MaDM = Request()->input('MaDM');
     $tintucUpdate = News::find($matt);
       if (request()->hasFile('image')) {
        $file = request()->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $tintucUpdate->HinhAnh = $filename;
    }

     $tintucUpdate->TenTT= $TenTT;
     $tintucUpdate->NgayTao= $NgayTao;
     $tintucUpdate->MoTa= $MoTa;
     $tintucUpdate->MaDM= $MaDM;
     if($tintucUpdate->save()){
         return redirect('new');
     }
 }
 public function delete($matt){
     $tintucDelete = News::find($matt);
     if($tintucDelete->delete()){
         return redirect('new');
 }




 // public function dashboard()
 // {
 //     $user = Auth::user();
 //     return view('admin.dashboard', compact('user'));
 // }
}

public function search(Request $request)
    {
        $search = $request->input('search');
        $new = News::query()
            ->where('TenTT', 'LIKE', "%{$search}%")
            ->get();
        return view('user.search', ['news'=> $new]);
    }
}


