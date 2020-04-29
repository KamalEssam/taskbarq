<?php

namespace App\Http\Controllers;

use App\Http\Traits\FilesTrait;
use App\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    use FilesTrait; //Using our created Trait to access inside trait method

    // get home page for user
    public function getHome()
    {
        $videos=video::with('user')->get()->all();
        return view('layouts.starter',compact('videos'));
    }

    // get home page for user
    public function getRecord()
    {
        return view('layouts.addVideo');
    }

    // add video record
    public function addVideo(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'keyword' => 'required',
            'type' => 'required',
            'video_url' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'image_url' => 'required|mimes:jpeg,jpg,png'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $nameID=video::latest('id')->first();
        $name=$nameID->id+1;

        //image part
        $image = $request['image_url'];
        if (isset($image)) {
            try {
                $filePath = $this->ImageUpload($image,$name); //Passing $image as parameter to our created method
                $image_url = $filePath;
            } catch (\Exception $e) {
                return redirect()->back()->with('error','fails upload image');
            }
        }
        // video part
        $video = $request['video_url'];
        if (isset($video)) {
            try {
                $filePath = $this->VideoUpload($video,$name); //Passing $image as parameter to our created method
                $video_url = $filePath;
            } catch (\Exception $e) {
                return redirect()->back()->with('error','fails to upload video');
            }
        }
        $data = video::create([
            'created_by' => auth()->user()->id,
            'video_url' => $video_url,
            'image_url' => $image_url,
            'is_notified' => 0,
            'keyword' => $request['keyword'],
            'type' => $request['type']
        ]);
        return redirect()->back()->with('success', 'the video data uploaded successfully ');
    }


    public function delete(Request $request , $id)
    {
        video::where('id',$id)->delete();
        return redirect()->back()->with('success','Record has been deleted');
    }


}
