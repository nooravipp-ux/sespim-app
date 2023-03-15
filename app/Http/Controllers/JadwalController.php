<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index(){
        $data = DB::table('t_jadwal')
                ->select('t_jadwal.*', 'm_dikbang.name')
                ->join('m_dikbang', 'm_dikbang.id', '=', 't_jadwal.kategori')
                ->get();
        return view('admin.jadwal.index', compact('data'));
    }

    public function create(){
        $dikbang = DB::table('m_dikbang')->get();
        return view('admin.jadwal.create', compact('dikbang'));
    }

    public function save(Request $request){
        $file = $request->file('file');
        $fileName = NULL;

        if ($file) {
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file_destinationPath = public_path() . '/admin/media/img/jadwal';
            $file->move($file_destinationPath, $fileName);
        }

        DB::table('t_jadwal')->insert([
            "kategori" => $request->kategori,
            "file" => $fileName,
            "publish" => $request->status,
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->route('jadwal.index');
    }

    public function edit($id){
        $dikbang = DB::table('m_dikbang')->get();
        $jadwal = DB::table('t_jadwal')->where('id', $id)->first();
        return view('admin.jadwal.edit', compact('jadwal', 'dikbang'));
    }

    public function update(Request $request){
        $file = $request->file('file');
        $fileName = NULL;

        if ($file) {
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file_destinationPath = public_path() . '/admin/media/img/jadwal';
            $file->move($file_destinationPath, $fileName);
        }else{
            $fileName = $request->file_existing;
        }

        DB::table('t_jadwal')->where('id', $request->id)->update([
            "kategori" => $request->kategori,
            "file" => $fileName,
            "publish" => $request->status,
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->route('jadwal.index');
    }

    public function delete($id){
        DB::table('t_jadwal')->where('id', $id)->delete();
        return redirect()->back();
    }
}
