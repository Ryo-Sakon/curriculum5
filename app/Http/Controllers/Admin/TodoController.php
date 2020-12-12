<?php

// namespaceとは、PHPで名前空間（エイリアス）を設定するために使用されるものです。
// 一般的にPHPフォルダーのはじめにnamespace <ファイルのパス>と記載します。
// エイリアスをファイルのパスにすることで自動読み込みを行うことができるようにしています。

namespace App\Http\Controllers\Admin;//ファイルの位置

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    public function add()
    {
        return view('todo/create');
        //resourse/views/todo/create.blade.php
    }

    public function create(Request $request) //Requestクラスの変数$request
    {
      // todo/createにリダイレクトする
        return redirect('todo/create');
    }
}
//このメソッドの実行は、どこに書かれているか？→web.php
//ここは、機能そのもの
//createメソッドを実行するという発想はどうやる？
