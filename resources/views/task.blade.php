@extends('layouts.app')

@section('content')
<div class="project-container">
        <h1>{{ $projectName }} &nbsp;:&nbsp;{{ $cardName }}</h1>

        <div class="project-edit">
            <div class="project-create">
              <button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" data-whatever="new-card">TODOを追加</button>
            </div>

            <div class="project-status">
                <h2>タスクのステータス</h2>
                <form action="{{ url('/card/status/'.$cardId) }}" method="post" >
                @csrf    
                  <select name="status" id="status" onchange="submit(this.form)">
                    <option value="未着手">未着手</option>
                    <option value="進行中">進行中</option>
                    <option value="完了">完了</option>
                  </select>
                </form>
            </div>
        </div>

    <h4 class="h4-title">TODO 一覧</h4>
    <div class="project-cards">
        <div class="i-cards task-status1">
          <h2>未着手</h2>
            @foreach($tasks as $task)
            @if($task->status == '未着手' && $task->card_id == $id)
            <div class="i-card">            
               <form class="status-change" action="" method="get" ></form> {{-- Jqueryで実行するformタグ　ディスプレイ上は非表示 --}}      
               <p class="card-text card-title">{{ $task->name }}</p>
               <div class="card-text priority day">
                 優先度：<?php echo $task->priority ?> 　期限：<?php echo date('n/j h:m', strtotime($task->limit_day));  ?></div>
                <p class="search-id" style="display: none"><?php echo $task->id; ?> </p>  {{-- Jqueryに渡すためにプロジェクトidを出力　ディスプレイ上は非表示 --}}
            </div>
            @endif
            @endforeach
        </div>

        <div class="i-cards task-status2">
          <h2>進行中</h2>
            @foreach($tasks as $task)
            @if($task->status == '進行中' && $task->card_id == $id)
            <div class="i-card">  
                <form class="status-change" action="" method="get" ></form> {{-- Jqueryで実行するformタグ　ディスプレイ上は非表示 --}}                
                <p class="card-text card-title">{{ $task->name }}</p>
                <div class="card-text priority day">
                  優先度：<?php echo $task->priority ?> 　期限：<?php echo date('n/j h:m', strtotime($task->limit_day));  ?></div>
                <p class="search-id" style="display: none"><?php echo $task->id; ?> </p>  {{-- Jqueryに渡すためにプロジェクトidを出力　ディスプレイ上は非表示 --}} 
            </div>
            @endif
            @endforeach
        </div>

        <div class="i-cards task-status3">
          <h2>完了</h2>
            @foreach($tasks as $task)
            @if($task->status == '完了' && $task->card_id == $id)
            <div class="i-card">  
                <form class="status-change" action="" method="get" ></form> {{-- Jqueryで実行するformタグ　ディスプレイ上は非表示 --}}                
                <p class="card-text card-title">{{ $task->name }}</p>
                <div class="card-text priority day">
                  優先度：<?php echo $task->priority ?> 　期限：<?php echo date('n/j h:m', strtotime($task->limit_day));  ?></div>
                  <p class="search-id" style="display: none"><?php echo $task->id; ?> </p>  {{-- Jqueryに渡すためにプロジェクトidを出力　ディスプレイ上は非表示 --}} 
            </div>
            @endif
            @endforeach
            </div>
            <div class="task-delete trash">
            </div>

    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">新規TODOを作成</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
          <form action="" method="post" class="new-task">
          @csrf
            <div class="form-group">
              <label for="inputTitle" id="card-name">カード名</label>
              <input id="inputTitle" type="text" class="form-control" name="name">
            </div>
              <div class="form-group">
               <label for="inputLimit">完了期限</label><br>
               <input id="inputLimit" name="limit" type="datetime-local" class="form-control" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required>
             </div>
             <div class="form-group">
               <label for="inputPriority">優先度</label><br>
               <select id="inputPriority" name="priority" class="form-control" name="priority">
                   <option value="高">高</option>
                   <option value="中">中</option>
                   <option value="低">低</option>
               </select>
             </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
             <button id="save" type="submit" class="btn btn-primary">作成する</button>
            </form> 
           </div> 
         </div>
       </div>
    </div>
    

    

@endsection
