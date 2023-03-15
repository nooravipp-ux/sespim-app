<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Imports\ImportSerdik;
use Maatwebsite\Excel\Facades\Excel;

use File;

class SerdikController extends Controller
{
    public function index()
    {
        $serdik = DB::table('t_identitas')
            ->select('t_identitas.id','t_identitas.user_id', 't_identitas.nama_lengkap', 't_identitas.email', 't_identitas.nrp', 'm_dikbang.name as dikbang', 't_identitas.created_at')
            ->join('users', 'users.id', '=', 't_identitas.user_id')
            ->join('m_dikbang', 'm_dikbang.id', '=', 't_identitas.dikbang')
            ->orderBy('id', 'desc')
            ->get('t_identitas.id');
        return view('admin.serdik.index', compact('serdik'));
    }

    public function saveInit(Request $request)
    {

        DB::table('users')->insert([
            "name" => $request->nrp,
            "email" => $request->email,
            "role_id" => 2,
            "password" => Hash::make($request->nrp),
        ]);

        $lastId = DB::table('users')->orderBy('id', 'desc')->first();

        DB::table('t_identitas')->insert([
            "nama_lengkap" => $request->nama_lengkap,
            "user_id" => $lastId->id,
            "nrp" => $request->nrp,
            "email" => $request->email,
            "dikbang" => $request->dikbang,
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->route('serdik.index');
    }

    public function createIdentitas($user_id)
    {
        $dikbang = DB::table('m_dikbang')->get();
        $data = DB::table('t_identitas')->where('user_id', $user_id)->first();
        return view('admin.serdik.create-identitas', compact('data', 'dikbang'));
    }

    public function biodata($user_id)
    {
        $dikbang = DB::table('m_dikbang')->get();
        $data = DB::table('t_identitas')->where('user_id', $user_id)->first();
        return view('admin.serdik.create-identitas', compact('data', 'dikbang'));
    }

    public function saveIdentitas(Request $request)
    {

        $data = DB::table('t_identitas')->where('user_id', $request->user_id)->update([
            "nama_lengkap" => $request->nama_lengkap,
            "nama_panggilan" => $request->nama_panggilan,
            "pangkat" => $request->pangkat,
            "nrp" => $request->nrp,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "agama" => $request->agama,
            "jabatan" => $request->jabatan,
            "kesatuan" => $request->kesatuan,
            "tanggal_masuk_polri" => $request->tanggal_masuk_polri,
            "suku" => $request->suku,
            "alamat_kantor" => $request->alamat_kantor,
            "alamat_rumah" => $request->alamat_rumah,
            "no_ktp" => $request->no_ktp,
            "no_bpjs" => $request->no_bpjs,
            "no_npwp" => $request->no_npwp,
            "no_telp" => $request->no_telp,
            "email" => $request->email,
            "nama_ayah" => $request->nama_ayah,
            "pekerjaan_ayah" => $request->pekerjaan_ayah,
            "nama_ibu" => $request->nama_ibu,
            "pekerjaan_ibu" => $request->pekerjaan_ibu,
            "alamat_orang_tua" => $request->alamat_orang_tua,
            "berat_badan" => $request->berat_badan,
            "tinggi_badan" => $request->tinggi_badan,
            "gol_darah" => $request->gol_darah,
            "penyakit_sering_diderita" => $request->penyakit_sering_diderita,
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->back();
    }

    public function createPendidikan($user_id)
    {
        $userId = $user_id;
        $umum = DB::table('t_pendidikan')->where('user_id', $user_id)->where('kategori', 'UMUM')->get();
        $polri = DB::table('t_pendidikan')->where('user_id', $user_id)->where('kategori', 'POLRI')->get();
        $kursus = DB::table('t_pendidikan')->where('user_id', $user_id)->where('kategori', 'KURSUS')->get();
        return view('admin.serdik.create-pendidikan', compact('userId', 'umum', 'polri', 'kursus'));
    }

    public function savePendidikan(Request $request)
    {

        $data = DB::table('t_pendidikan')->insert([
            "user_id" => $request->user_id,
            "kategori" => $request->kategori,
            "jenis" => $request->jenis,
            "tahun_lulus" => $request->tahun_lulus,
            "tempat_pend" => $request->tempat_pend,
            "ranking" => $request->ranking,
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->back();
    }

    public function editPendidikan($id)
    {
        $pendidikan = DB::table('t_pendidikan')->where('id', $id)->first();
        return view('admin.serdik.edit.pendidikan', compact('pendidikan'));
    }

    public function updatePendidikan(Request $request)
    {

        $data = DB::table('t_pendidikan')->where('id', $request->id)->update([
            "kategori" => $request->kategori,
            "jenis" => $request->jenis,
            "tahun_lulus" => $request->tahun_lulus,
            "tempat_pend" => $request->tempat_pend,
            "ranking" => $request->ranking,
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->route('serdik.create.pendidikan', ['user_id' => $request->user_id]);
    }

    public function deletePendidikan($id)
    {
        DB::table('t_pendidikan')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function createKepangkatan($user_id)
    {
        $userId = $user_id;
        $data = DB::table('t_riwayat_kepangkatan')->where('user_id', $user_id)->get();;
        return view('admin.serdik.create-kepangkatan', compact('userId', 'data'));
    }

    public function saveKepangkatan(Request $request)
    {

        $data = DB::table('t_riwayat_kepangkatan')->insert([
            "user_id" => $request->user_id,
            "pangkat" => $request->pangkat,
            "terhitung_mulai_tanggal" => $request->terhitung_mulai_tanggal,
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->back();
    }

    public function editKepangkatan($id){
        $kepangkatan = DB::table('t_riwayat_kepangkatan')->where('id', $id)->first();
        return view('admin.serdik.edit.kepangkatan', compact('kepangkatan'));
    }

    public function updateKepangkatan(Request $request){
        DB::table('t_riwayat_kepangkatan')->where('id', $request->id)->update([
            "pangkat" => $request->pangkat,
            "terhitung_mulai_tanggal" => $request->terhitung_mulai_tanggal,
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->route('serdik.create.kepangkatan', ['user_id' => $request->user_id]);
    }

    public function deleteKepangkatan($id){
        DB::table('t_riwayat_kepangkatan')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function createJabatan($user_id)
    {
        $userId = $user_id;
        $data = DB::table('t_riwayat_jabatan')->where('user_id', $user_id)->get();;
        return view('admin.serdik.create-jabatan', compact('userId', 'data'));
    }

    public function saveJabatan(Request $request)
    {

        $data = DB::table('t_riwayat_jabatan')->insert([
            "user_id" => $request->user_id,
            "jabatan" => $request->jabatan,
            "kesatuan" => $request->kesatuan,
            "tanggal_mulai" => $request->tanggal_mulai,
            "tanggal_berakhir" => $request->tanggal_berakhir,
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->back();
    }

    public function editJabatan($id){
        $jabatan = DB::table('t_riwayat_jabatan')->where('id', $id)->first();
        return view('admin.serdik.edit.jabatan', compact('jabatan'));
    }

    public function updateJabatan(Request $request){
        DB::table('t_riwayat_jabatan')->where('id', $request->id)->update([
            "jabatan" => $request->jabatan,
            "kesatuan" => $request->kesatuan,
            "tanggal_mulai" => $request->tanggal_mulai,
            "tanggal_berakhir" => $request->tanggal_berakhir,
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->route('serdik.create.jabatan', ['user_id' => $request->user_id]);
    }

    public function deleteJabatan($id){
        DB::table('t_riwayat_jabatan')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function createPenghargaan($user_id)
    {
        $userId = $user_id;
        $data = DB::table('t_penghargaan')->where('user_id', $user_id)->get();;
        return view('admin.serdik.create-penghargaan', compact('userId', 'data'));
    }

    public function savePenghargaan(Request $request)
    {

        $data = DB::table('t_penghargaan')->insert([
            "user_id" => $request->user_id,
            "penghargaan" => $request->penghargaan,
            "deskripsi" => $request->deskripsi,
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->back();
    }

    public function editPenghargaan($id){
        $penghargaan = DB::table('t_penghargaan')->where('id', $id)->first();
        return view('admin.serdik.edit.penghargaan', compact('penghargaan'));
    }

    public function updatePenghargaan(Request $request){
        DB::table('t_penghargaan')->where('id', $request->id)->update([
            "penghargaan" => $request->penghargaan,
            "deskripsi" => $request->deskripsi,
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->route('serdik.create.penghargaan', ['user_id' => $request->user_id]);
    }

    public function deletePenghargaan($id){
        DB::table('t_penghargaan')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function createBahasa($user_id)
    {
        $userId = $user_id;
        $data = DB::table('t_pengetahuan_bahasa')->where('user_id', $user_id)->get();;
        return view('admin.serdik.create-bahasa', compact('userId', 'data'));
    }

    public function saveBahasa(Request $request)
    {

        $data = DB::table('t_pengetahuan_bahasa')->insert([
            "user_id" => $request->user_id,
            "jenis_bahasa" => $request->jenis_bahasa,
            "nama_bahasa" => $request->nama_bahasa,
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->back();
    }

    public function editBahasa($id){
        $bahasa = DB::table('t_pengetahuan_bahasa')->where('id', $id)->first();
        return view('admin.serdik.edit.bahasa', compact('bahasa'));
    }

    public function updateBahasa(Request $request){
        DB::table('t_pengetahuan_bahasa')->where('id', $request->id)->update([
            "jenis_bahasa" => $request->jenis_bahasa,
            "nama_bahasa" => $request->nama_bahasa,
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->route('serdik.create.bahasa', ['user_id' => $request->user_id]);
    }

    public function deleteBahasa($id){
        DB::table('t_pengetahuan_bahasa')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function createHobi($user_id)
    {
        $userId = $user_id;
        $data = DB::table('t_hobi')->where('user_id', $user_id)->get();
        return view('admin.serdik.create-hobi', compact('userId', 'data'));
    }

    public function saveHobi(Request $request)
    {

        // $data = DB::table('t_hobi')->insert([
        //     "user_id" => $request->user_id,
        //     "jenis_bahasa" => $request->jenis_bahasa,
        //     "nama_bahasa" => $request->nama_bahasa,
        //     "created_at" => date("Y-m-d H:i:s"),
        //     "created_by" => Auth::user()->name
        // ]);

        return redirect()->back();
    }

    public function createPasangan($user_id)
    {
        $userId = $user_id;
        $data = DB::table('t_pasangan')->where('user_id', $user_id)->first();
        // dd($data);
        if ($data != null) {
            return view('admin.serdik.create-pasangan', compact('userId', 'data'));
        }else{
            return view('admin.serdik.create-pasangan', compact('userId', 'data'));
        }
    }

    public function savePasangan(Request $request)
    {

        $userId = $request->user_id;
        $data = DB::table('t_pasangan')->where('user_id', $userId)->first();

        if ($data != null) {
            $data = DB::table('t_pasangan')->where('user_id', $userId)->update([
                "nama" => $request->nama,
                "nama_panggilan" => $request->nama_panggilan,
                "tempat_lahir" => $request->tempat_lahir,
                "tanggal_lahir" => $request->tanggal_lahir,
                "jenis_kelamin" => $request->jenis_kelamin,
                "tempat_nikah" => $request->tempat_nikah,
                "tanggal_nikah" => $request->tanggal_nikah,
                "agama" => $request->agama,
                "pekerjaan" => $request->pekerjaan,
                "pendidikan_terakhir" => $request->pendidikan_terakhir,
                "alamat_rumah" => $request->alamat_rumah,
                "nama_ibu_pasangan" => $request->nama_ibu_pasangan,
                "nama_ayah_pasangan" => $request->nama_ayah_pasangan,
                "alamat_orang_tua_pasangan" => $request->alamat_orang_tua_pasangan,
                "updated_at" => date("Y-m-d H:i:s"),
                "updated_by" => Auth::user()->name
            ]);
        } else {
            $data = DB::table('t_pasangan')->insert([
                "user_id" => $request->user_id,
                "nama" => $request->nama,
                "nama_panggilan" => $request->nama_panggilan,
                "tempat_lahir" => $request->tempat_lahir,
                "tanggal_lahir" => $request->tanggal_lahir,
                "jenis_kelamin" => $request->jenis_kelamin,
                "tempat_nikah" => $request->tempat_nikah,
                "tanggal_nikah" => $request->tanggal_nikah,
                "agama" => $request->agama,
                "pekerjaan" => $request->pekerjaan,
                "pendidikan_terakhir" => $request->pendidikan_terakhir,
                "alamat_rumah" => $request->alamat_rumah,
                "nama_ibu_pasangan" => $request->nama_ibu_pasangan,
                "nama_ayah_pasangan" => $request->nama_ayah_pasangan,
                "alamat_orang_tua_pasangan" => $request->alamat_orang_tua_pasangan,
                "created_at" => date("Y-m-d H:i:s"),
                "created_by" => Auth::user()->name
            ]);
        }

        return redirect()->back();
    }

    public function createAnak($user_id)
    {
        $userId = $user_id;
        $data = DB::table('t_anak')->where('user_id', $user_id)->get();;
        return view('admin.serdik.create-anak', compact('userId', 'data'));
    }

    public function saveAnak(Request $request)
    {

        $data = DB::table('t_anak')->insert([
            "user_id" => $request->user_id,
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "umur" => $request->umur,
            "pendidikan_terakhir" => $request->pendidikan_terakhir,
            "kelas" => $request->kelas,
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->back();
    }

    public function editAnak($id){
        $anak = DB::table('t_anak')->where('id', $id)->first();
        return view('admin.serdik.edit.anak', compact('anak'));
    }

    public function updateAnak(Request $request){
        DB::table('t_anak')->where('id', $request->id)->update([
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "umur" => $request->umur,
            "pendidikan_terakhir" => $request->pendidikan_terakhir,
            "kelas" => $request->kelas,
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->route('serdik.create.anak', ['user_id' => $request->user_id]);
    }

    public function deleteAnak($id){
        DB::table('t_anak')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function createKontakDarurat($user_id)
    {
        $userId = $user_id;
        $data = DB::table('t_kontak_darurat')->where('user_id', $user_id)->get();;
        return view('admin.serdik.create-kontak-darurat', compact('userId', 'data'));
    }

    public function saveKontakDarurat(Request $request)
    {

        $data = DB::table('t_kontak_darurat')->insert([
            "user_id" => $request->user_id,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "no_telepon" => $request->no_telepon,
            "alasan" => $request->alasan,
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->back();
    }


    public function editKontakDarurat($id)
    {
        $kontakDarurat = DB::table('t_kontak_darurat')->where('id', $id)->first();
        return view('admin.serdik.edit.kontak-darurat', compact('kontakDarurat'));
    }

    public function updateKontakDarurat(Request $request)
    {
        DB::table('t_kontak_darurat')->where('id', $request->id)->update([
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "no_telepon" => $request->no_telepon,
            "alasan" => $request->alasan,
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->route('serdik.create.kontak-darurat', ['user_id' => $request->user_id]);
    }

    public function deleteKontakDarurat($id)
    {
        DB::table('t_kontak_darurat')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function import(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        $file = $request->file('file');
        $fileName = NULL;

        if ($file) {
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file_destinationPath = public_path() . '/admin/media/file-import';
            $file->move($file_destinationPath, $fileName);
        }

        Excel::import(new ImportSerdik, public_path('/admin/media/file-import/'.$fileName));

        if(File::exists(public_path('/admin/media/file-import/'.$fileName))){
            File::delete(public_path('/admin/media/file-import/'.$fileName));
        }else{
            dd('File does not exists.');
        }

        return redirect()->back();
    }
}
