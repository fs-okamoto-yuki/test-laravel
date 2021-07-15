<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Authクラスが使えるようになる記載
use Validator;
use App\Card;
use App\Project;

class CardController extends Controller
{
    //    
    protected $fillable = [
        'name','priority','limit_day','status','id'
    ];

    public function showCard($id)
        {
        //    ここでプロジェクト表示用のデータを定義 latest()->get()でTweetデータを取得できる
        //    latest()は最新順にとれる
        $cards = Card::latest()->paginate(100);
        $projectName = Project::where('id', $id)->value('name');
    
    
        // 上で取得したデータをビューさせるときに配列の形で渡す
        return view('card', ['cards' =>$cards, 'id' => $id, 'projectName' => $projectName]);
    }
    

    public function store(Request $request, $id)
    {
        // 新規保存

        var_dump($id);
        $card = new Card();


        $limit =date('Y-n-j h:m', strtotime($request->limit));

        $card->name = $request->name;
        $card->project_id = $id;
        $card->limit_day = $limit;
        $card->status = '未着手';
        $card->priority = $request->priority;

        $card->save();

        return back();

    }   

    

    public function cardStatus(Request $request, $id)
    {
        // ステータス変更
        $card = Card::where('id', $id)->first();
        var_dump($card);

        $card->status = $request->status;
        $card->save();

        // return back();
        return back();


    }   


  
    // ステータスをドラッグアンドドロップで変更した場合の処理
    public function cardDragStatus1($id)
    {
        
        $card = Card::where('id', $id)->first();

        $card->status = "未着手";
        $card->save();

        return back();
    }   
    

    public function cardDragStatus2($id)
    {
        
        $card = Card::where('id', $id)->first();

        $card->status = "進行中";
        $card->save();

        return back();
    }   

    public function cardDragStatus3($id)
    {
        
        $card = Card::where('id', $id)->first();

        $card->status = "完了";
        $card->save();

        return back();
    }   


    public function delete($id)
    {
        // 削除する処理
        $card = Card::where('id', $id)->first();
        $card->delete();

        return back();
    }   
    
    


}


