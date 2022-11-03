<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
class NewsController extends Controller
{
    public $model;
    //ham tao
    public function __construct(){
        //gan bien $model thqanh mot ben object cua class news
        //khi do tu bien $model nay co the goi cac ham trong class News
        $this->model = new News();
    }
    //lay danh sach ban ghi
    public function read( Request $request){
        //lay du lieu tu ham modelRead
        $data = $this->model->modelRead();
        //goi view
        return view("admin.news_read",["data"=>$data]);
    }
    //update
    public function update(Request $request, $id){
        //laay mot ban ghi
        $record = $this->model->modelGetRecord($id);
        return view("admin.news_create_update",["record"=>$record]);
    }
    //update post
    public function updatePost(Request $request,$id){
        $this->model->modelUpdate($id);
        return redirect(url('admin/news'));
    }
    public function create(Request $request){
        return view("admin.news_create_update");
    }
    public function createPost(Request $request){
        $this->model->modelCreate();
        return redirect(url('admin/news'));
    }
    public function delete(Request $request, $id){
        $this->model->modelDelete($id);
        return redirect(url('admin/news'));
    }
}
