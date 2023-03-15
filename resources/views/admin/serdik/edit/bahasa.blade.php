@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Bahasa</h4>
                    <form class="form-sample" method="post" action="{{route('serdik.update.bahasa')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Jenis Bahasa</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="jenis_bahasa">
                                            <option value="ASING" <?php echo ($bahasa->jenis_bahasa) == "ASING" ? "selected" : ""; ?>>ASING</option>
                                            <option value="DAERAH">DAERAH</option>
                                        </select>
                                        <input type="hidden" class="form-control" name="id" value="{{$bahasa->id}}" />
                                        <input type="hidden" class="form-control" name="user_id" value="{{$bahasa->user_id}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Bahasa</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_bahasa" value="{{$bahasa->nama_bahasa}}"/>
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