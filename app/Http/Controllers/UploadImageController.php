<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UploadImage;

class UploadImageController extends Controller
{
    function show(){
        $id = Auth::id();
        $date = '2021-03-01';
        $item = User::where('id', $id)->first();
		return view('home.upload_form', ['item'=>$item]);
	}

	function upload(Request $request){
		$request->validate([
			'image' => 'required|file|image|mimes:png,jpeg'
		]);
		$upload_image = $request->file('image');
	
		if($upload_image) {
			$user_id = Auth::id();
			//アップロードされた画像を保存する
			$path = $upload_image->store('public/uploads');
			//画像の保存に成功したらDBに記録する
			if($path){
				UploadImage::create([
					'user_id' => $user_id,
					'file_name' => $upload_image->getClientOriginalName(),
					'file_path' => $path
				]);
			}
		}
		return redirect(route('edit'));
	}
}
