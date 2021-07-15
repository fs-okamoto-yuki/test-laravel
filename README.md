# Name
 
TaskChecker 環境構築手順書
 
簡易タスク管理システム 



# Requirement
 
 
* PHP 8.0.8
* Composer 2.1.3
* Laravel Framework 7.30.4
* npm 6.14.13
 


# Installation
 
 
■composerのインストール


① Composer公式ページよりインストーラーをダウンロード
 https://getcomposer.org/doc/00-intro.md
  ※要再起動

② ターミナルでcomposer -v を入力し、インストールできているか確認




■Laravelインストール


① XAMMPのhtdocsフォルダに移動し、下記コマンドを実行

composer create-project --prefer-dist laravel/laravel (アプリ名) "バージョン"


composer create-project --prefer-dist laravel/laravel taskchecker "7.*"


② .envファイルの編集(DB_DATABASE, DB_SOCKET)
  DB_SOCKET=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock  (Windowsは不要)
  DB_DATABASE=TaskChecker


③ DB作成(phpmyadminにて.envファイルに記載のDB名でデータベース作成)

④ migrationファイル作成とmigrateの実行

⑤ php artisan key:generate実行





■npmのインストール


下記URLからnpmをインストール
https://laraweb.net/environment/3523/
※LTS(推奨版)をインストール 要再起動





■認証機能(Auth)作成 ※事前にnpmのインストールが必要
 migrationの実装が終わった後に実行→画面右上にログインボタンが表示されていれば成功


① composer require laravel/ui "^2.0"

② php artisan ui vue --auth

③ npm install

④ npm run dev






■動作確認
php artisan serve

上記コマンドを実行後、
http://localohost:8000 にアクセスし
ログイン画面が表示されれば環境構築完了