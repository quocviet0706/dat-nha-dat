<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function getAll(){
        return Menu::orderbyDesc('id')->get();
    }
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }
    public function create($request){
        try{
            Menu::create([
                'name'=>(string)$request->input('name'),
                'parent_id'=>(int)$request->input('parent_id'),
                'description'=>(string)$request->input('description'),
                'content'=>(string)$request->input('content'),
                'active'=>(int)$request->input('active'),
                'slug'=> Str::slug($request->input('name'),'-')
            ]);


            Session::flash('success','Tạo danh mục thành công');

        } catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
    }
    public function update($request, $menu) : bool{
        $menu->fill($request->input());
        $menu->save();
        Session::flash('success','Cập nhật thành công danh mục');
        return true;
    }
    public function destroy($request){
        try{
            $id = $request->input('id');
            $menu = Menu::where('id',$id)->first();
            if($menu){
                return Menu::where('id', $id)->orWhere('parent_id',$id)->delete();
            }
            return false;

        } catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
    }


}
