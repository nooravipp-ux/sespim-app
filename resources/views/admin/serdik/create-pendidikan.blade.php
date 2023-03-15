@extends('layouts.admin')
@section('title', 'Admin - SERDIK')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.identitas', ['user_id' => $userId])}}">Identitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('serdik.create.pendidikan', ['user_id' => $userId])}}" aria-current="page">Pendidikan</a>
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
                            <a class="nav-link" href="{{route('serdik.create.pasangan', ['user_id' => $userId])}}">Pasangan</a>
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
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New</h4>
                    <form class="form-sample" method="post" action="{{route('serdik.save.pendidikan')}}" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="jenis" />
                                        <input type="hidden" class="form-control" name="user_id" value="{{$userId}}" />
                                    </div>
                                </div>
                                <div class="form-group row" id="ranking">
                                    <label class="col-sm-12">Ranking</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="ranking" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Tempat Pendidikan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_pend" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Tahun Lulus</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tahun_lulus" />
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
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Umum</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategory</th>
                                    <th>Desc</th>
                                    <th>Tempat Pendidikan</th>
                                    <th>Tahun Lulus</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nu = 1; ?>
                                @foreach($umum as $u)
                                <tr>
                                    <td><?php echo $nu++; ?></td>
                                    <td>{{$u->kategori}}</td>
                                    <td>{{$u->jenis}}</td>
                                    <td>{{$u->tempat_pend}}</td>
                                    <td>{{$u->tahun_lulus}}</td>
                                    <td>
                                        <a href="{{route('serdik.edit.pendidikan', ['id' => $u->id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
                                        <a href="{{route('serdik.delete.pendidikan', ['id' => $u->id])}}"><i class="icon-grid menu-icon ti-trash" onclick="confirm('are you sure ?');"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">POLRI</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategory</th>
                                    <th>Desc</th>
                                    <th>Tempat Pendidikan</th>
                                    <th>Tahun Lulus</th>
                                    <th>Ranking</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $pn = 1; ?>
                                @foreach($polri as $p)
                                <tr>
                                    <td><?php echo $pn++; ?></td>
                                    <td>{{$p->kategori}}</td>
                                    <td>{{$p->jenis}}</td>
                                    <td>{{$p->tempat_pend}}</td>
                                    <td>{{$p->tahun_lulus}}</td>
                                    <td>{{$p->ranking}}</td>
                                    <td>
                                        <a href="{{route('serdik.edit.pendidikan', ['id' => $u->id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
                                        <a href="{{route('serdik.delete.pendidikan', ['id' => $u->id])}}"><i class="icon-grid menu-icon ti-trash" onclick="confirm('are you sure ?');"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kursus / Sertifikasi</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategory</th>
                                    <th>Desc</th>
                                    <th>Tempat Pendidikan</th>
                                    <th>Tahun Lulus</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nk = 1; ?>
                                @foreach($kursus as $k)
                                <tr>
                                    <td><?php echo $nk++; ?></td>
                                    <td>{{$k->kategori}}</td>
                                    <td>{{$k->jenis}}</td>
                                    <td>{{$k->tempat_pend}}</td>
                                    <td>{{$k->tahun_lulus}}</td>
                                    <td>
                                        <a href="{{route('serdik.edit.pendidikan', ['id' => $u->id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
                                        <a href="{{route('serdik.delete.pendidikan', ['id' => $u->id])}}"><i class="icon-grid menu-icon ti-trash" onclick="confirm('are you sure ?');"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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