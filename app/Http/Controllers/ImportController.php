<?php

namespace App\Http\Controllers;

use App\IsMembersPwcp;
use App\IsMembers;
use App\CsvData;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    public function getImport()
    {
         return view('reports.import');
    }

    public function parseImport(CsvImportRequest $request)
    {

        $info = $request->toArray();
  
        $path = $request->file('csv_file')->getRealPath();

        if ($request->has('header')) {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
        } else {
            $data = array_map('str_getcsv', file($path));
        }

        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
            $csv_data = array_slice($data, 0, 2);

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('reports.import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file', 'info'));

    }

    public function processImport(Request $request)
    {
        $info = $request->toArray();
        
        if($info['csv_file_source'] == 'transactions')
        {
            $data = CsvData::find($request->csv_data_file_id);
            $csv_data = json_decode($data->csv_data, true);
            foreach ($csv_data as $row) {
                $IsMembersPwcp = new IsMembersPwcp();
                foreach (config('app.db_fields') as $index => $field) {
                    if ($data->csv_header) {
                        $IsMembersPwcp->$field = $row[$request->fields[$field]];
                    } else {
                        $IsMembersPwcp->$field = $row[$request->fields[$index]];
                    }
                }
                $IsMembersPwcp->save();
            }
    
        }
        else
        {
            $data = CsvData::find($request->csv_data_file_id);
            $csv_data = json_decode($data->csv_data, true);
            foreach ($csv_data as $row) {
                $IsMembers = new IsMembers();
                foreach (config('app.db_contact_fields') as $index => $field) {
                    if ($data->csv_header) {
                        $IsMembers->$field = $row[$request->fields[$field]];
                    } else {
                        $IsMembers->$field = $row[$request->fields[$index]];
                    }
                }
                $IsMembers->save();
            }

        }

        return view('reports.import_success');
    }

}
