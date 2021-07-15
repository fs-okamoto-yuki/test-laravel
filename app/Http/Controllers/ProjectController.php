<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Authクラスが使えるようになる記載
use Validator;
use App\Project;

class ProjectController extends Controller
{
    //

    protected $fillable = [
        'name','priority','limit_day','status'
    ];


    public function showProject()
        {
        //    ここでプロジェクト表示用のデータを定義 latest()->get()でTweetデータを取得できる
        //    latest()は最新順にとれる
        $projects = Project::latest()->paginate(100);
    
    
        // 上で取得したデータをビューさせるときに配列の形で渡す
        return view('project', ['projects' =>$projects]);
    }


    public function store(Request $request)
    {

        // 保存
        $project = new Project();


        $limit =date('Y-n-j h:m', strtotime($request->limit));

        $project->user_id = Auth::user()->id;
        $project->name = $request->name;
        $project->limit_day = $limit;
        $project->status = '未着手';
        $project->priority = $request->priority;

        $project->save();

        return redirect()->route('showProject');

    }   


    public function projectStatus(Request $request, $id)
    {

        // ステータス変更
        $project = Project::where('id', $id)->first();

        $project->status = $request->status;
        $project->save();

        return back();


    }   

    // ステータスをドラッグアンドドロップで変更した場合の処理
    public function projectDragStatus1($id)
    {
        
        $project = Project::where('id', $id)->first();

        $project->status = "未着手";
        $project->save();

        return back();
    }   
    

    public function projectDragStatus2($id)
    {
        
        $project = Project::where('id', $id)->first();

        $project->status = "進行中";
        $project->save();

        return back();
    }   

    public function projectDragStatus3($id)
    {
        
        $project = Project::where('id', $id)->first();

        $project->status = "完了";
        $project->save();

        return back();
    }   
    
    public function delete($id)
    {
        // 削除する処理
        $project = Project::where('id', $id)->first();
        $project->delete();

        return back();
    }   





}