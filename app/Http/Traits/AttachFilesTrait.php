<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request,$name)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->move(public_path('attachments/library'),$file_name);

    }
    public function uploadlesson($request,$name)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->move(public_path('attachments/lesson'),$file_name);

    }
    public function uploadbook($request,$name)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->move(public_path('attachments/book'),$file_name);

    }
    public function uploadquestion($request,$name)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->move(public_path('attachments/question'),$file_name);

    }
    public function uploadlogo($request,$name)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->move(public_path('attachments/logo'),$file_name);

    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/library/'.$name);

        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/library/'.$name);
        }
    }
    public function deleteBook($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/book/'.$name);

        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/book/'.$name);
        }
    }
    public function deleteQuestion($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/question/'.$name);

        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/question/'.$name);
        }
    }
}