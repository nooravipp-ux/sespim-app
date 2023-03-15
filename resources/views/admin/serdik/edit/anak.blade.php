@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Anak</h4>
                    <form class="form-sample" method="post" action="{{route('serdik.update.anak')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama" value="{{$anak->nama}}"/>
                                        <input type="hidden" class="form-control" name="id" value="{{$anak->id}}" />
                                        <input type="hidden" class="form-control" name="user_id" value="{{$anak->user_id}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="jenis_kelamin">
                                            <option value="1" <?php echo ($anak->jenis_kelamin == 1) ? "selected" : ""; ?>>Laki - Laki</option>
                                            <option value="2" <?php echo ($anak->jenis_kelamin == 2) ? "selected" : ""; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Umur</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="umur" value="{{$anak->umur}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Pendidikan Terakhir</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="pendidikan_terakhir">
                                            <option value="1" <?php echo ($anak->pendidikan_terakhir == 1) ? "selected" : ""; ?> >SD</option>
                                            <option value="2" <?php echo ($anak->pendidikan_terakhir == 2) ? "selected" : ""; ?>>SMP</option>
                                            <option value="3" <?php echo ($anak->pendidikan_terakhir == 3) ? "selected" : ""; ?>>SMA / SMK</option>
                                            <option value="4" <?php echo ($anak->pendidikan_terakhir == 4) ? "selected" : ""; ?>>S1</option>
                                            <option value="5" <?php echo ($anak->pendidikan_terakhir == 5) ? "selected" : ""; ?>>S2</option>
                                            <option value="6" <?php echo ($anak->pendidikan_terakhir == 6) ? "selected" : ""; ?>>S3</option>
                                            <option value="7" <?php echo ($anak->pendidikan_terakhir == 7) ? "selected" : ""; ?>>Lain - Lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">kelas</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="kelas" value="{{$anak->kelas}}"/>
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