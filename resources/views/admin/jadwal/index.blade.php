@extends('layouts.admin')
@section('title', 'Admin - Posts')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Jadwal</h4>
                    <a href="{{route('jadwal.create')}}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori</th>
                                    <th>File</th>
                                    <th>Publish</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nc = 1; ?>
                                @foreach($data as $dt)
                                <tr>
                                    <td><?php echo $nc++; ?></td>
                                    <td>{{$dt->name}}</td>
                                    <td>{{$dt->file}}</td>
                                    <td>
                                        @if($dt->publish == 1)
                                        Yes
                                        @else
                                        No
                                        @endif
                                    </td>
                                    <td>{{$dt->created_at}}</td>
                                    <td>
                                        <a href="{{route('jadwal.edit', ['id' => $dt->id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
                                        <a href="{{route('jadwal.delete', ['id' => $dt->id])}}"><i class="icon-grid menu-icon ti-trash"></i></a>
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