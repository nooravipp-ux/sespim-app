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
                            <a class="nav-link" aria-current="page" href="#">Identitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.pendidikan', ['user_id' => $userId])}}">Pendidikan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.kepangkatan', ['user_id' => $userId])}}">Kepangkatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.jabatan', ['user_id' => $userId])}}">Jabatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.penghargaan', ['user_id' => $userId])}}">Penghargaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.bahasa', ['user_id' => $userId])}}">Bahasa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.hobi', ['user_id' => $userId])}}">Hobi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('serdik.create.pasangan', ['user_id' => $userId])}}" aria-current="page">Pasangan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.anak', ['user_id' => $userId])}}">Anak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.kontak-darurat', ['user_id' => $userId])}}">Kontak Darurat</a>
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
                    <form class="form-sample" method="post" action="{{route('serdik.save.pasangan')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama Lengkap</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama" value="<?php echo $data == null ? "" : $data->nama ?>"/>
                                        <input type="hidden" class="form-control" name="user_id" value="{{$userId}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama Panggilan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_panggilan" value="<?php echo $data == null ? "" : $data->nama_panggilan ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tempat Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data == null ? "" : $data->tempat_lahir ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tanggal Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $data == null ? "" : $data->tanggal_lahir ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="jenis_kelamin">
                                            <option value="1" <?php echo ($data != null && $data->jenis_kelamin != 1) ? "" : "selected" ?>>Laki - Laki</option>
                                            <option value="2" <?php echo ($data != null && $data->jenis_kelamin != 2) ? "" : "selected" ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tempat Nikah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_nikah" value="<?php echo $data == null ? "" : $data->tempat_nikah ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tanggal Nikah</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="tanggal_nikah" value="<?php echo $data == null ? "" : $data->tanggal_nikah ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Agama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="agama" value="<?php echo $data == null ? "" : $data->agama ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Pekerjaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="pekerjaan" value="<?php echo $data == null ? "" : $data->pekerjaan ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Pendidikan Terkahir</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="pendidikan_terakhir" value="<?php echo $data == null ? "" : $data->pendidikan_terakhir ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Alamat Rumah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="alamat_rumah" value="<?php echo $data == null ? "" : $data->alamat_rumah ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama Ibu Pasangan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_ibu_pasangan" value="<?php echo $data == null ? "" : $data->nama_ibu_pasangan ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama Ayah Pasangan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_ayah_pasangan" value="<?php echo $data == null ? "" : $data->nama_ayah_pasangan ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Alamat Orangtua Pasangan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="alamat_orang_tua_pasangan" value="<?php echo $data == null ? "" : $data->alamat_orang_tua_pasangan ?>"/>
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