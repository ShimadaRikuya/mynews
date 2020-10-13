<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profiles;

class ProfileController extends Controller
{
    //
    public function add()
{
    return view('admin.profile.create');
}

public function create(Request $request)
{
    $this->validate($request, Profiles::$rules);

    $profile = new Profiles;
    $form = $request->all();

    unset($form['_token']);

    $profile->fill($form);
    $profile->save();
    return redirect('admin/profile/create');
}

public function edit()
{
    return view('admin.profile.edit');
}

public function update()
{
    return redirect('admin/profile/edit');
}

}
