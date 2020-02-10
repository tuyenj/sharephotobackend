<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhoto;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(StorePhoto $request)
    {
        // 投稿写真の拡張子を取得する
        $extension = $request->photo->extension();

        $photo = new Photo();

        // インスタンス生成時に割り振られたランダムなID値と
        // 本来の拡張子を組み合わせてファイル名とする
        $photo->filename = $photo->id . '.' . $extension;

        \Storage::cloud()->putFileAs('', $request->photo, $photo->filename, '');

        \DB::beginTransaction();
        try {
            Auth::user()->photos()->save($photo);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            \Storage::cloud()->delete($photo->filename);
            throw $exception;
        }

        return response($photo, 201);
    }
}
