<?php

namespace App\Http\Controllers\staff;

use App\Models\GeneratedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadApprovedFormController extends Controller
{
    public function filedownload($id)
    {
        $generatedFile = GeneratedFile::findOrFail($id);
        if ($generatedFile->uploadfile) {
            $filePath = public_path("uploads/ApprovedForm/{$generatedFile->uploadfile}");
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'No Document Found!');
        }
    }
}
