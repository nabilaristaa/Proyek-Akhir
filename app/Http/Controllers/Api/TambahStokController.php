<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\tambah_stok;
use App\Models\Produk;

class TambahStokController extends Controller
{
    public function tambah_stok(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stok_tambah'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'   => 0,
                'pesan'     =>$validator->errors()], 401);
        }

        $produk = Produk::find($request->produk_id);

        $stok_produk = $produk->stok;

        $tambah_stok = new tambah_stok([
            'produk_id'     => $request->produk_id,
            'stok_tambah'   => $request->stok_tambah,
        ]);

        $produk->update(['stok' => $stok_produk + $request->stok_tambah,
        ]);

        $tambah_stok->save();
        return response()->json([
            'tambah_stok'       => $tambah_stok,
            'success'           => 1, 
            'message'           => 'Tambah Stook Produk Berhasil',
            'tambahstok_id'     => (string)$tambah_stok->id,
        ], 201);
    }

    public function hapus_stok(tambah_stok $hapus_stok){
        $hapus_stok->delete();
        $data=[
            "msg"=>"data telah di hapus",
            "status"=>200,
        ];
                return response()->json($data);
        }


}
