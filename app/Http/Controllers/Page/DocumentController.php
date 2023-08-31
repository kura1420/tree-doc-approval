<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //
    public function viewFile($id, $filename)
    {
        $row = Document::findOrFail($id);

        if ($row->filename !== $filename) {
            return abort(404);
        }

        $path = storage_path('app/document/' . $row->filename);

        return response()->file($path);
    }
}
