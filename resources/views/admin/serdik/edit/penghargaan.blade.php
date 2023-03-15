@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Penghargaan</h4>
                    <form class="form-sample" method="post" action="{{route('serdik.update.penghargaan')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Penghargaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="penghargaan" value="{{$penghargaan->penghargaan}}" />
                                        <input type="hidden" class="form-control" name="id" value="{{$penghargaan->id}}"/>
                                        <input type="hidden" class="form-control" name="user_id" value="{{$penghargaan->user_id}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Deskripsi</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="deskripsi" value="{{$penghargaan->deskripsi}}" />
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