@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Kepangkatan</h4>
                    <form class="form-sample" method="post" action="{{route('serdik.update.kepangkatan')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Pangkat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="pangkat" value="{{$kepangkatan->pangkat}}" />
                                        <input type="hidden" class="form-control" name="id" value="{{$kepangkatan->id}}" />
                                        <input type="hidden" class="form-control" name="user_id" value="{{$kepangkatan->user_id}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Terhitung Mulai Tanggal</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="terhitung_mulai_tanggal" value="{{$kepangkatan->terhitung_mulai_tanggal}}"/>
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
