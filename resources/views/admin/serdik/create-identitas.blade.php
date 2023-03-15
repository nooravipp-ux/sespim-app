@extends('layouts.admin')
@section('title', 'Admin - Roles')
@section('content')
<div class="content-wrapper">
<div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Identitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.pendidikan', ['user_id' => $data->user_id])}}">Pendidikan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.kepangkatan', ['user_id' => $data->user_id])}}">Kepangkatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.jabatan', ['user_id' => $data->user_id])}}">Jabatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.penghargaan', ['user_id' => $data->user_id])}}">Penghargaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.bahasa', ['user_id' => $data->user_id])}}">Bahasa</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.hobi', ['user_id' => $data->user_id])}}">Hobi</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.pasangan', ['user_id' => $data->user_id])}}">Pasangan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.anak', ['user_id' => $data->user_id])}}">Anak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.kontak-darurat', ['user_id' => $data->user_id])}}">Kontak Darurat</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form class="form-sample" method="post" action="{{route('serdik.save.identitas')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama Lengkap</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_lengkap" value="{{$data->nama_lengkap}}" />
                                        <input type="hidden" class="form-control" name="user_id" value="{{$data->user_id}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama Panggilan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_panggilan" value="{{$data->nama_panggilan}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">DIKBANG</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="dikbang" value="{{$data->dikbang}}">
                                            @foreach($dikbang as $d)
                                            <option value="{{$d->id}}" <?php echo ($d->id == $data->dikbang) ? "selected" : ""; ?>>{{$d->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Pangkat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="pangkat" value="{{$data->pangkat}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">NRP</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nrp" value="{{$data->nrp}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tempat Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_lahir" value="{{$data->tempat_lahir}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tanggal Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="tanggal_lahir" value="{{$data->tanggal_lahir}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Agama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="agama" value="{{$data->agama}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Jabatan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="jabatan" value="{{$data->jabatan}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Kesatuan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="kesatuan" value="{{$data->kesatuan}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tanggal Masuk POLRI</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="tanggal_masuk_polri" value="{{$data->tanggal_masuk_polri}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Suku</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="suku" value="{{$data->suku}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Alamat Rumah</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control" name="alamat_rumah">{{$data->alamat_rumah}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Alamat Kantor</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control" name="alamat_kantor">{{$data->alamat_kantor}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">No. KTP</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="no_ktp" value="{{$data->no_ktp}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">No. BPJS</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="no_bpjs" value="{{$data->no_bpjs}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">No. NPWP</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="no_npwp" value="{{$data->no_npwp}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">No. Telepon</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="no_telp" value="{{$data->no_telp}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="email" value="{{$data->email}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama Ayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_ayah" value="{{$data->nama_ayah}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Pekerjaan Ayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="pekerjaan_ayah" value="{{$data->pekerjaan_ayah}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama Ibu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_ibu" value="{{$data->nama_ibu}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Pekerjaan Ibu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="pekerjaan_ibu" value="{{$data->pekerjaan_ibu}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Alamat Orang Tua</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control" name="alamat_orang_tua">{{$data->alamat_orang_tua}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Berat Badan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="berat_badan" value="{{$data->berat_badan}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tinggi Badan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tinggi_badan" value="{{$data->tinggi_badan}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Gol. Darah</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="gol_darah">
                                            <option value="A" <?php echo ($data->gol_darah == 'A') ? "selected" : ""; ?>>A</option>
                                            <option value="B" <?php echo ($data->gol_darah == 'B') ? "selected" : ""; ?>>B</option>
                                            <option value="O" <?php echo ($data->gol_darah == 'O') ? "selected" : ""; ?>>O</option>
                                            <option value="AB"<?php echo ($data->gol_darah == 'AB') ? "selected" : ""; ?>>AB</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Penyakit Yang Sering Di Derita</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="penyakit_sering_diderita" value="{{$data->penyakit_sering_diderita}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Foto</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" name="file"/>
                                        <input type="hidden" class="form-control" name="file_existing" value="{{$data->foto_profil}}"/>
                                        @if($data->foto_profil)
                                        <a href="{{asset('admin/media/foto-profil-peserta/'.$data->foto_profil)}}" target="_blank"><small class="form-text text-muted">Klik untuk melihat foto</small></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection