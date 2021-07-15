<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Authクラスが使えるようになる記載
use Validator;
use App\Task;
use App\Card;
use App\Project;


class TaskController extends Controller
{
    //
    protected $fillable = [
        'name','priority','limit_day','status','id'
    ];

    public function showTask($id)
        {
        //    ここでプロジェクト表示用のデータを定義 latest()->get()でTweetデータを取得できる
        //    latest()は最新順にとれる
        $tasks = Task::latest()->paginate(100);
        $cardName = Card::where('id', $id)->value('name');
        $cardId = Card::where('id', $id)->value('id');
        $projectId = Card::where('id', $id)->value('project_id');
        $projectName = Project::where('id', $projectId)->value('name');


        // 上で取得したデータをビューさせるときに配列の形で渡す
        return view('task', ['tasks' =>$tasks, 'id' => $id, 'cardName' => $cardName, 'cardId' => $cardId, 'projectName' => $projectName]);
    }
    

    public function store(Request $request, $id)
    {
     
        // 保存
        $task = new Task();


        $limit =date('Y-n-j h:m', strtotime($request->limit));

        $task->name = $request->name;
        $task->card_id = $id;
        $task->limit_day = $limit;
        $task->status = '未着手';
        $task->priority = $request->priority;

        $task->save();

        return back();

    }   

    public function taskStatus($id)
    {
        // ステータス変更
        $task = Task::where('id', $id)->first();

        $task->status = '進行中';
        $task->save();

        // return back();
        return back();
    } 


    public function taskStatus2($id)
    {
        // ステータス変更
        $task = Task::where('id', $id)->first();
        
        $task->status = '完了';
        $task->save();

        // return back();
        return back();
    } 
    



    // ステータスをドラッグアンドドロップで変更した場合の処理
    public function taskDragStatus1($id)
    {
        
        $task = Task::where('id', $id)->first();

        $task->status = "未着手";
        $task->save();

        return back();
    }   
    

    public function taskDragStatus2($id)
    {
        
        $task = Task::where('id', $id)->first();

        $task->status = "進行中";
        $task->save();

        return back();
    }   

    public function taskDragStatus3($id)
    {
        
        $task = Task::where('id', $id)->first();

        $task->status = "完了";
        $task->save();

        return back();
    }   
    
    public function delete($id)
    {
        // 削除する処理
        $task = Task::where('id', $id)->first();
        $task->delete();

        return back();
    }   

}