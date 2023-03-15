@extends('layouts.admin')
@section('title', 'Admin - Jadwal')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Jadwal</h4>
                    <form class="form-sample" method="post" action="{{route('jadwal.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="kategori">
                                            <option value="">-</option>
                                            @foreach($dikbang as $d)
                                            <option value="{{$d->id}}" <?php echo ($d->id == $jadwal->kategori) ? "selected" : ""; ?>>{{$d->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" class="form-control" name="id" value="{{$jadwal->id}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">File</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="file" />
                                        <input type="hidden" class="form-control" name="file_existing" value="{{$jadwal->file}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select type="text" class="form-control" name="status">
                                            <option value="1" <?php echo ($jadwal->publish == 1) ? "selected" : ""; ?>>Yes</option>
                                            <option value="0" <?php echo ($jadwal->publish == 0) ? "selected" : ""; ?>>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

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