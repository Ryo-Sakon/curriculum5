<?php
// namespaceとは、PHPで名前空間（エイリアス）を設定するために使用されるものです。
// 一般的にPHPフォルダーのはじめにnamespace <ファイルのパス>と記載します。
// エイリアスをファイルのパスにすることで自動読み込みを行うことができるようにしています。

namespace App\Http\Controllers\Admin; //ファイルの位置

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;

class TodoController extends Controller
{
    public function add()
    {
        return view('todo/create');
        //resourse/views/todo/create.blade.php
    }

    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, Todo::$rules);
        $todo = new Todo;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        $todo->fill($form);
        $todo->is_complete = 0;

        // データベースに保存する

        $todo->save();
        return redirect('todo/');
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $todos = Todo::where('title', $cond_title)->get();
        } else {
            // それ以外はすべて取得する
            $todos = Todo::all();
        }
        return view('todo.index', ['todos' => $todos, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
  {
      // Todo Modelからデータを取得する
      $todos = Todo::find($request->id);
      if (empty($todos)) {
        abort(404);    
      }
      return view('todo.edit', ['todo_form' => $todos]);
  }

  public function update(Request $request)
  {
    // Validationをかける
    $this->validate($request, Todo::$rules);
    // Todo Modelからデータを取得する
    $todo = Todo::find($request->get('id'));
    // 送信されてきたフォームデータを格納する
    $todo_form = $request->all();

    unset($todo_form['_token']);
    unset($todo_form['remove']);

    // 該当するデータを上書きして保存する
    $todo->fill($todo_form)->save();

    return redirect('todo');
}
//このメソッドの実行は、どこに書かれているか？→web.php
//ここは、機能そのもの
//createメソッドを実行するという発想はどうやる？
