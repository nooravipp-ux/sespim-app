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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.hobi', ['user_id' => $userId])}}">Hobi</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('serdik.create.pasangan', ['user_id' => $userId])}}">Pasangan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('serdik.create.anak', ['user_id' => $userId])}}" aria-current="page">Anak</a>
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
                    <form class="form-sample" method="post" action="{{route('serdik.save.anak')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama" />
                                        <input type="hidden" class="form-control" name="user_id" value={{$userId}} />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="jenis_kelamin">
                                            <option value="1">Laki - Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Umur</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="umur" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Pendidikan Terakhir</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="pendidikan_terakhir">
                                            <option value="1">SD</option>
                                            <option value="2">SMP</option>
                                            <option value="3">SMA / SMK</option>
                                            <option value="4">S1</option>
                                            <option value="5">S2</option>
                                            <option value="6">S3</option>
                                            <option value="7">Lain - Lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">kelas</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="kelas" />
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
                    <h4 class="card-title">Penghargaan</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $pn = 1; ?>
                                @foreach($data as $p)
                                <tr>
                                    <td><?php echo $pn++; ?></td>
                                    <td>{{$p->nama}}</td>
                                    <td>{{$p->jenis_kelamin}}</td>
                                    <td>{{$p->umur}}</td>
                                    <td>{{$p->pendidikan_terakhir}}</td>
                                    <td>{{$p->kelas}}</td>
                                    <td>
                                    <a href="{{route('serdik.edit.anak', ['id' => $p->id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
                                        <a href="{{route('serdik.delete.anak', ['id' => $p->id])}}"><i class="icon-grid menu-icon ti-trash" onclick="confirm('are you sure ?');"></i></a>
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