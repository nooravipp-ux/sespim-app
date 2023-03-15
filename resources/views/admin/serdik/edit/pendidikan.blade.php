@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Pendidikan</h4>
                    <form class="form-sample" method="post" action="{{route('serdik.update.pendidikan')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Kategory</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="kategori" id="kategori">
                                            <option value="UMUM">Umum</option>
                                            <option value="POLRI">POLRI</option>
                                            <option value="KURSUS">Kursus / Sertifikasi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Jenis</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="jenis" value="{{$pendidikan->jenis}}"/>
                                        <input type="hidden" class="form-control" name="id" value="{{$pendidikan->id}}" />
                                        <input type="hidden" class="form-control" name="user_id" value="{{$pendidikan->user_id}}" />
                                    </div>
                                </div>
                                <div class="form-group row" id="ranking">
                                    <label class="col-sm-12">Ranking</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="ranking" value="{{$pendidikan->ranking}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Tempat Pendidikan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_pend" value="{{$pendidikan->tempat_pend}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tahun Lulus</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tahun_lulus" value="{{$pendidikan->tahun_lulus}}"/>
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
<script>
    $(document).ready(function() {
        $('#ranking').hide();

        var kategori = $('#kategori').val();
        if (kategori) {
            if ($('#kategori').val() == 'UMUM' || $('#kategori').val() == 'KURSUS') {
                $('#ranking').hide();
            } else {
                $('#ranking').show();
            }
        }
    });
</script>
<script>
    $('#kategori').change(function() {
        if ($(this).val() == 'UMUM' || $(this).val() == 'KURSUS') {
            $('#ranking').hide();
        } else {
            $('#ranking').show();
        }
    });
</script>

@endsection