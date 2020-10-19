{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- admin.blade.phpの@yield('title')に'Myプロフィール'を埋め込む --}}
@section('title', 'Myプロフィール編集')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">

                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2" for="name">氏名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="{{ $posts_form->name }}">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0" for="gender">性別</legend>
                        <div class="col-md-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="男性" @if ( old('gender') != '女性' )checked="checked"@endif>男性
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="女性" @if ( old('gender') == '女性' ) checked="checked"@endif>女性
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label class="col-md-2" for="hobby">趣味</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="hobby" rows="5">{{ $posts_form->hobby }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="introduction">自己紹介蘭</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="introduction" rows="10">{{ $posts_form->introduction }}</textarea>
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection