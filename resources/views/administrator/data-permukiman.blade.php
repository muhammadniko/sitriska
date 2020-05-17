@extends('layout.administrator')
@section('title', 'Data Permukiman - SI TRISKA')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permukiman
        <small>12 Permukiman Terdaftar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> SI TRISKA</a></li>
        <li class="active">Data Permukiman</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Daftar Permukiman</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary">Tambah Lokasi</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover table-bordered">
                <tr>
                  <th>Opsi</th>
                  <th>Kode Pos</th>
                  <th>Kelurahan</th>
                  <th>Kecamatan</th>
                  <th>Kordinat</th>
                  <th>Luas Area</th>
                  <th>Tingkat Risiko</th>
                </tr>
                @foreach ($list_of_lokasi as $lokasi)
                <tr>
                  <td>
                    <button id="edit" data-id="{{$lokasi->kode_pos}}" class="btn btn-primary btn-sm">Ubah</button>
                    <a href="/administrator/permukiman/remove/{{$lokasi->kode_pos}}"><button class="btn btn-danger btn-sm">Hapus</button></a>
                  </td>
                  <td>{{$lokasi->kode_pos}}</td>
                  <td>{{$lokasi->kelurahan}}</td>
                  <td>{{$lokasi->kecamatan}}</td>
                  <td>{{$lokasi->latitude}}, {{$lokasi->latitude}}</td>
                  <td>{{$lokasi->luas_area}}KM<sup>2</sup></td>
                  <td>
                    @foreach ($lokasi->score as $score)
                    {{$score->tingkat_risiko}}
                    @endforeach
                  </td>
                </tr>
                @endforeach
              </table>
              Tambah Lokasi Permukiman Baru :
              <form action = "/administrator/permukiman/add-new")}}" method="post">
                {{ csrf_field() }}
                Kode Pos : <input type="text" name="kodepos">
                kelurahan : <input type="text" name="kelurahan">
                Kecamatan : <input type="text" name="kecamatan">
                Luas Area : <input type="text" name="luasarea">
                Latitude : <input type="text" name="lat">
                Langitude : <input type="text" name="lang">
                <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                <input type="submit" class="btn btn-primary" value="Tambahkan">
              </form>

              <hr>

              Ubah Data Lokasi Permukiman:
              <form action = "/administrator/permukiman/update")}}" method="post">
                {{ csrf_field() }}
                Kode Pos : <input type="text" id="new_kode_pos" name="kodeposupdated" value="" disabled>
                Kecamatan : <input type="text" name="kecamatanupdated">
                kelurahan : <input type="text" name="kelurahanupdated">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
  $(document).on('click', '#edit', function(){
    var id = $(this).data('id');
    $("#new_kode_pos").val(id)
    console.log(id)    
  })
</script>
@endsection