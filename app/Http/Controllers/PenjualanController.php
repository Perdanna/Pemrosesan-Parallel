<?php

namespace App\Http\Controllers;

use App\Jobs\PenjualanProses;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('upload-file');
    }

    public function upload()
    {
        if (request()->has('data_csv')) {
            // $data = array_map('str_getcsv', file(request()->data_csv));
            $data = file(request()->data_csv);
            // $header = $data[0];
            // unset($data[0]);

            $chunks = array_chunk($data, 1000);
            // dd($chunks[0]);

            foreach ($chunks as $key => $chunk) {
                $name = "/tmp{$key}.csv";
                $path = resource_path('temp');
                // return $path . $name;
                file_put_contents($path . $name, $chunk);
            }

            // foreach ($data as $value) {
            //     $dataPenjualan = array_combine($header, $value);
            //     Penjualan::create($dataPenjualan);
                // Penjualan::create()
            // }
            return 'Selesai';
            return $data;
        }
        return 'Silahkan upload disini';
    }

    public function store() 
    {
        $path = resource_path('temp');
        $files = glob("$path/*.csv");

        $header = [];
        foreach ($files as $key => $file) {
            $data = array_map('str_getcsv', file($file));
            if($key == 0) {
                $header = $data[0];
                unset($data[0]);
            }

            
        PenjualanProses::dispatch($data, $header);
        unlink($file);
        }
        return 'Tersimpan';
    }
}
