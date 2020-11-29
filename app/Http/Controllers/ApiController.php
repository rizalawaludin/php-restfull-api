<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stuff;

class ApiController extends Controller
{
    public function get_all_barang()
    {
    	return response()->json(stuff::all(),200);
    }
    public function insert_data_barang(Request $request)
    {	
    	$insert = new stuff;
    	$insert->nama_barang = $request->nama_barang;
    	$insert->jumlah_barang = $request->jumlah_barang;
    	$insert->save();

    	return response([
    		'status' => 'OK',
    		'message' => 'Barang Disimpan',
    		'data' => $insert
    	]);
    }
    public function update_data_barang(Request $request,$id)
    {
    	$check_barang = stuff::firstWhere('kode_barang',$id);
    	if($check_barang){
    		$data = stuff::find($id);
    		$data->nama_barang = $request->nama_barang;
    		$data->jumlah_barang = $request->jumlah_barang;
    		$data->save();
    		return response([
	    		'status' => 'OK',
	    		'message' => 'Data Berhasil Diubah',
	    		'data' => $data
	    	],200);
    	}else{
	    	return response([
	    		'status' => 'Not Found',
	    		'message' => 'Kode Barang Tidak Ditemukan',
	    	],404);
    	}
    }
    public function delete_data_barang($id)
    {
    	$check_barang = stuff::firstWhere('kode_barang',$id);
	    if($check_barang){
	    	$data = stuff::destroy($id);
	    	return response([
		    	'status' => 'OK',
		    	'message' => 'Data Berhasil Dihapus',
		    ],200);
	    }else{
		    return response([
		    	'status' => 'Not Found',
		    	'message' => 'Kode Barang Tidak Ditemukan',
		    ],404);
	    }
    }
}
