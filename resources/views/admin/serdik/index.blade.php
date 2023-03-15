@extends('layouts.admin')
@section('title', 'Admin - SERDIK')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New</h4>
                    <form class="form-sample" method="post" action="{{route('serdik.save.init')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">Nama Lengkap</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_lengkap" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" name="email" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12">NRP</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nrp" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12">DIKBANG</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="dikbang">
                                            <option value="1">SESPIMA</option>
                                            <option value="2">SESPIMEN</option>
                                            <option value="3">SESPIMTI</option>
                                        </select>
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
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data Serdik</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-sample" method="POST" action="{{route('serdik.import')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Upload File (Excel)</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" name="file" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Import Data</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Data Serdik</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">Import</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>NRP</th>
                                    <th>Email</th>
                                    <th>DIKBANG</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nc = 1; ?>
                                @foreach($serdik as $s)
                                <tr>
                                    <td><?php echo $nc++; ?></td>
                                    <td>{{$s->nama_lengkap}}</td>
                                    <td>{{$s->nrp}}</td>
                                    <td>{{$s->email}}</td>
                                    <td>{{$s->dikbang}}</td>
                                    <td>{{$s->created_at}}</td>
                                    <td>
                                        <a href="{{route('serdik.create.identitas', ['user_id' => $s->user_id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
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