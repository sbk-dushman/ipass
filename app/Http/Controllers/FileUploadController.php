<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('dropFile');
    }
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlsx,csv',
            
        ]);
        // 'file' => 'required|mimes:pdf,xlx,csv|max:2048',

        try {
            $inputFileName = $request->file;
            $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
            $spreadsheet = $reader->load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();

            $reader->setReadDataOnly(true);
            Personal::get();
            for( $i = 2; $i <= $worksheet->getHighestRow(); $i++ ) {
                if( !($worksheet->getCellByColumnAndRow(2, $i)->getValue() &&
                $worksheet->getCellByColumnAndRow(3, $i)->getValue() &&
                $worksheet->getCellByColumnAndRow(4, $i)->getValue() &&
                $worksheet->getCellByColumnAndRow(5, $i)->getValue() &&
                $worksheet->getCellByColumnAndRow(6, $i)->getValue() &&
                $worksheet->getCellByColumnAndRow(8, $i)->getValue()) ) {
                    DB::table('personals')->insert([
                        'name' => $worksheet->getCellByColumnAndRow(2, $i)->getValue(),
                        'surname' => $worksheet->getCellByColumnAndRow(3, $i)->getValue(),
                        'lastname' => $worksheet->getCellByColumnAndRow(4, $i)->getValue(),
                        'position' => $worksheet->getCellByColumnAndRow(5, $i)->getValue(),
                        'src' =>  $worksheet->getCellByColumnAndRow(6, $i)->getValue(),
                        'number' => $worksheet->getCellByColumnAndRow(8, $i)->getValue(),
                    ]);
                }
                return redirect()->back()->with('success', 'true');
            }

        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            die('Error loading file: ' . $e->getMessage());
        }
    }
}
