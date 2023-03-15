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
                            <a class="nav-link active" href="{{route('serdik.create.bahasa', ['user_id' => $userId])}}" aria-current="page">Bahasa</a>
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
                    <form class="form-sample" method="post" action="{{route('serdik.save.bahasa')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Jenis Bahasa</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="jenis_bahasa">
                                            <option value="ASING">ASING</option>
                                            <option value="DAERAH">DAERAH</option>
                                        </select>
                                        <input type="hidden" class="form-control" name="user_id" value={{$userId}} />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Bahasa</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_bahasa" />
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
                    <h4 class="card-title">Pengetahuan Bahasa</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jenis Bahasa</th>
                                    <th>Nama Bahasa</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $pn = 1; ?>
                                @foreach($data as $p)
                                <tr>
                                    <td><?php echo $pn++; ?></td>
                                    <td>{{$p->jenis_bahasa}}</td>
                                    <td>{{$p->nama_bahasa}}</td>
                                    <td>
                                        <a href="{{route('serdik.edit.bahasa', ['id' => $p->id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
                                        <a href="{{route('serdik.delete.bahasa', ['id' => $p->id])}}"><i class="icon-grid menu-icon ti-trash" onclick="confirm('are you sure ?');"></i></a>
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