<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDOException;

use App\Models\Photo;

class FileController extends Controller
{
    /**
     * @var string
     */
    public $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path('upload');
    }

    /**
     * Upload the image from request
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:jpg,png,jpeg,gif,svg', 'max:1048567']
        ]);

        $fileName = $request->file->getClientOriginalName();
        $uploadName = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move($this->uploadPath, $uploadName);

        $insert = [
            'title' => $fileName,
            'file_path' => $uploadName
        ];

        try {
            $check = Photo::insert($insert);
            if (!$check) throw new PDOException();
        } catch (PDOException $e) {
            $filePath = $this->uploadPath . "/{$uploadName}";
            if (file_exists($filePath)) {
                File::delete($filePath);
            }
            
            return redirect()->back();
        }

        return response()->json(['success' => 'You have successfully upload ' . $fileName]);
    }
}