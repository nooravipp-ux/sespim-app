@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit kontak Darurat</h4>
                    <form class="form-sample" method="post" action="{{route('serdik.update.kontak-darurat')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama" value="{{$kontakDarurat->nama}}"/>
                                        <input type="hidden" class="form-control" name="id" value="{{$kontakDarurat->id}}" />
                                        <input type="hidden" class="form-control" name="user_id" value="{{$kontakDarurat->user_id}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Alamat</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control" name="alamat"> {{$kontakDarurat->alamat}} </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">No. Telepon</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="no_telepon" value="{{$kontakDarurat->no_telepon}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Kondisi pribadi / keluarga yang perlu dikemukakan</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control" name="alasan"> {{$kontakDarurat->alasan}} </textarea>
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