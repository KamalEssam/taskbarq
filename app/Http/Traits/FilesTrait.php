<?php

namespace App\Http\Traits;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait FilesTrait
{
    public function ImageUpload($query,$name) // Taking input image as parameter
    {
        $image_name = $name;
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'uploads/image/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path.$image_full_name;
        $success = $query->move($upload_path,$image_full_name);

        return $image_url; // Just return image
    }
    //uploading video
    public function VideoUpload($query,$name) // Taking input image as parameter
    {
        $video_name = $name;
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $video_full_name = $video_name.'.'.$ext;
        $upload_path = 'uploads/video/';    //Creating Sub directory in Public folder to put video
        $image_url = $upload_path.$video_full_name;
        $success = $query->move($upload_path,$video_full_name);

        return $image_url; // Just return video
    }

}
