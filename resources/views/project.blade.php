@extends('layouts.app')

@section('content')
<div class="project-container">
        <h1>プロジェクト一覧</h1>

        <div class="project-edit">
            <div class="project-create">
                <button type="button" class="btn btn-primary btn-lg project-btn" data-toggle="modal" data-target="#myModal">新規プロジェクト</button>
            </div>


            <div class="search"></div>
        </div>

    <div class="projects project-list">
        <div class="i-cards project-status1">
          <h2>未着手</h2>
            @foreach($projects as $project)
            @if($project->status == '未着手' && $project->user_id == Auth::user()->id)
            <a href={{ route('showcard', [$project->id]) }}>
            <div class="i-card">   
                <form class="status-change" action="" method="get" ></form> {{-- Jqueryで実行するformタグ　ディスプレイ上は非表示 --}}       
                <p class="card-text card-title">{{ $project->name }}</p>
                <div class="card-text priority day">
                  優先度：<?php echo $project->priority ?> 　期限：<?php echo date('n/j h:m', strtotime($project->limit_day));  ?>
                <p class="search-id" style="display: none"><?php echo $project->id; ?> </p>  {{-- Jqueryに渡すためにプロジェクトidを出力　ディスプレイ上は非表示 --}}
                </div>
            </div></a>
            @endif
            @endforeach
        </div>

        <div class="i-cards  project-status2">
          <h2>進行中</h2>
            @foreach($projects as $project)
            @if($project->status == '進行中' && $project->user_id == Auth::user()->id)
            <a href={{ route('showcard', [$project->id]) }}>
            <div class="i-card">   
                <form class="status-change" action="" method="get" ></form> {{-- Jqueryで実行するformタグ　ディスプレイ上は非表示 --}}              
                <p class="card-text card-title">{{ $project->name }}</p>
                <div class="card-text priority day">
                  優先度：<?php echo $project->priority ?> 　期限：<?php echo date('n/j h:m', strtotime($project->limit_day));  ?></div>
                <p class="search-id" style="display: none"><?php echo $project->id; ?> </p>  {{-- Jqueryに渡すためにプロジェクトidを出力　ディスプレイ上は非表示 --}}
            </div></a>
            @endif
            @endforeach
        </div>

        <div class="i-cards  project-status3">
          <h2>完了</h2>
            @foreach($projects as $project)
            @if($project->status == '完了' && $project->user_id == Auth::user()->id)
            <a href={{ route('showcard', [$project->id]) }}>
            <div class="i-card">
                <form class="status-change" action="" method="get" ></form> {{-- Jqueryで実行するformタグ　ディスプレイ上は非表示 --}}                         
                <p class="card-text card-title">{{ $project->name }}</p>
                <div class="card-text priority day">
                  優先度：<?php echo $project->priority ?> 　期限：<?php echo date('n/j h:m', strtotime($project->limit_day));  ?></div>
                <p class="search-id" style="display: none"><?php echo $project->id; ?> </p>  {{-- Jqueryに渡すためにプロジェクトidを出力　ディスプレイ上は非表示 --}}
            </div></a>
            @endif
            @endforeach
        </div>
    </div>
    <div class="project-delete trash">
    </div>
</div>





    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">新規プロジェクトを作成</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
          <form action="{{ url('/project') }}" method="post" class="new-project">
          @csrf
            <div class="form-group">
              <label for="inputTitle">プロジェクト名</label>
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
