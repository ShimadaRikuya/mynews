<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
{
    return view('admin.profile.create');
}

public function index(Request $request)
{
    $cond_title = $request->cond_title;
    if ($cond_title != '') {
        // 検索されたら検索結果を取得する
        $posts = Profile::where('name', $cond_title)->get();
    } else {
        // それ以外はすべてのニュースを取得する
        $posts = Profile::all();
    }
    return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
}

public function create(Request $request)
{
    $this->validate($request, Profile::$rules);

    $profile = new Profile;
    $form = $request->all();

    unset($form['_token']);

    $profile->fill($form);
    $profile->save();
    return redirect('admin/profile/create');
}

public function edit(Request $request)
{
    // Profile Modelからデータを取得する
    $posts = Profile::find($request->id);
    if (empty($posts)) {
        abort(404);
    }
    return view('admin.profile.edit', ['posts_form' => $posts]);
}

public function update(Request $request)
{
    // Validationをかける
    $this->validate($request, Profile::$rules);
    // Profile Modelからデータを取得する
    $posts = Profile::find($request->id);
    // 送信されてきたフォームデータを格納する
    $posts_form = $request->all();
    unset($posts_form['_token']);

    // 該当するデータを上書きして保存する
    $posts->fill($posts_form)->save();

    return redirect('admin/profile/');
}

public function delete(Request $request)
{
    // 該当するProfile Modelを取得
    $posts = Profile::find($request->id);
    // 削除する
    $posts->delete();
    return redirect('admin/profile/');
}

}
