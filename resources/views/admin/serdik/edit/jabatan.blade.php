@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Kepangkatan</h4>
                    <form class="form-sample" method="post" action="{{route('serdik.update.jabatan')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Jabatan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="jabatan" value="{{$jabatan->jabatan}}" />
                                        <input type="hidden" class="form-control" name="id" value="{{$jabatan->id}}" />
                                        <input type="hidden" class="form-control" name="user_id" value="{{$jabatan->user_id}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tanggal Mulai</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="tanggal_mulai" value="{{$jabatan->tanggal_mulai}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Kesatuan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="kesatuan" value="{{$jabatan->kesatuan}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tanggal Berakhir</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="tanggal_berakhir" value="{{$jabatan->tanggal_berakhir}}"/>
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
