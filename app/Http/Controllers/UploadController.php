<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use FFMpeg;
use FFMpeg\Format\Video\X264;

class UploadController extends Controller
{
    public function store(Request $req, $movieID)
    {
        // Save
        $file = $req->file('file');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $path = $req->file('file')->storeAs('tmp/', $movieID . '.' . $extension);


        // Convert
        FFMpeg::fromDisk('tmp')
            ->open($movieID . "." . $extension)
            ->export()
            ->onProgress(function ($percentage) {
                error_log("{$percentage}% transcoded");
            })
            ->toDisk('uploads')
            ->inFormat((new X264)->setKiloBitrate(1500))
            ->save($movieID . '.mp4');

        // Delete temporary files
        Storage::delete($path);

        return redirect()->back();
    }
}
