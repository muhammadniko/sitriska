@extends('layout.administrator')
@section('title', 'Data Permukiman - SI TRISKA')
    
@section('head-script')
    <script src="https://maps.googleapis.com/maps/api/js"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Permukiman
            <small>{{ $jumlahLokasi }} Permukiman Terdaftar</small>
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
                        <h3 class="box-title">Daftar Wilayah</h3>
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-add">
                            Tambah Lokasi
                        </button>
                    </div> <!-- /.box-header -->
                    
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
                            @foreach ($listOfLokasi as $lokasi)
                            <tr>
                                <td>
                                    <button id="edit" data-id="{{$lokasi->kode_lokasi}}" data-kodepos="{{$lokasi->kode_pos}}" data-kelurahan="{{$lokasi->kelurahan}}" data-kecamatan="{{$lokasi->kecamatan}}" data-luas="{{$lokasi->luas_area}}" data-toggle="modal" data-target="#modal-edit" class="btn btn-primary btn-sm">Ubah</button>
                                    <button id="delete" data-id="{{$lokasi->kode_lokasi}}" data-toggle="modal" data-target="#modal-delete"  class="btn btn-danger btn-sm">Hapus</button></a>
                                </td>
                                <td>{{$lokasi->kode_pos}}</td>
                                <td>{{$lokasi->kelurahan}}</td>
                                <td>{{$lokasi->kecamatan}}</td>
                                <td>{{$lokasi->latitude}}, {{$lokasi->langitude}}</td>
                                <td>{{$lokasi->luas_area}} KM<sup>2</sup></td>
                                <td>
                                    @foreach ($lokasi->score as $score)
                                        {{$score->tingkat_risiko}}
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </table>  
                        <div class="modal fade" id="modal-add">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title">Tambah Lokasi Permukiman Baru</h4>
                                    </div>
                                    <form action = "/administrator/permukiman/add-new")}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Kode Pos</label>
                                                        <input type="text" class="form-control" name="kodepos">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kelurahan</label>
                                                        <input type="text" class="form-control" name="kelurahan">
                                                    </div>    
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <input type="text" class="form-control" name="kecamatan">
                                                    </div>
                                                    <label>Luas Area</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="luasarea" id="luas">
                                                        <span class="input-group-addon"><b>km<sup>2</sup></b></span>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Latitude</label>    
                                                        <input type="text" class="form-control" name="lat" id="lat" readonly>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Langitude</label>
                                                        <input type="text" class="form-control" name="lang" id="lng" readonly>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                                                </div>
                                                <div class="col-md-8">
                                                    <div id="petaBanjarmasin" style="width:100%;height:450px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Tambahkan">
                                        </div>
                                    </form>
                                </div> <!-- /.modal-content -->
                            </div> <!-- /.modal-dialog -->
                        </div> <!-- /.modal -->
                    
                        <div class="modal fade" id="modal-edit">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title">Ubah Data Lokasi Permukiman</h4>
                                    </div>
                                    <form action = "/administrator/permukiman/update")}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Kode Pos</label>
                                                        <input type="text" class="form-control" id="new_kode_pos" name="kodepos_updated" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kelurahan</label>
                                                        <input type="text" class="form-control" id="new_kelurahan" name="kelurahan_updated">
                                                    </div>    
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <input type="text" class="form-control" id="new_kecamatan" name="kecamatan_updated">
                                                    </div>
                                                    <label>Luas Area</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="new_luas" name="luas_updated">
                                                        <span class="input-group-addon"><b>km<sup>2</sup></b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="hidden" id="kode_lokasi" name="kode_lokasi">
                                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                        </div>
                                    </form>
                                </div> <!-- /.modal-content -->
                            </div> <!-- /.modal-dialog -->
                        </div> <!-- /.modal -->
                        
                        <div class="modal modal-warning fade" id="modal-delete">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title">Hapus Data Permukiman</h4>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus Data Permukiman ini ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                                        <a href="" id="delete_link"><button class="btn btn-danger">Hapus</button></a>
                                    </div>
                                </div> <!-- /.modal-content -->
                            </div> <!-- /.modal-dialog -->
                        </div> <!-- /.modal -->
                        
                    </div> <!-- /.box-body -->
                </div> <!-- /.box -->
            </div>
        </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
@endsection

@section('script')
<script src="{{ asset("/dist/js/maps-config.js") }}"></script>
<script>
	function initialize() {  
        var map = new google.maps.Map(document.getElementById("petaBanjarmasin"), setPeta)
        
        google.maps.event.addListener(map, 'click', function(event) {
            luas = $("#luas").val()
            setArea(map, event.latLng, luas)
            
            var kordinat = event.latLng
            $("#lat").val(kordinat.lat())
            $("#lng").val(kordinat.lng())
        })
    }
    
	google.maps.event.addDomListener(window, 'load', initialize);
    

</script>
<script>
    $(document).on('click', '#edit', function(){
        var id = $(this).data('id')
        var kode_pos = $(this).data('kodepos')
        var kelurahan = $(this).data('kelurahan')
        var kecamatan = $(this).data('kecamatan')
        var luas = $(this).data('luas')
        
        $("#kode_lokasi").val(id)
        $("#new_kode_pos").val(kode_pos)
        $("#new_kelurahan").val(kelurahan)
        $("#new_kecamatan").val(kecamatan)
        $("#new_luas").val(luas)
    })
    
    $(document).on('click', '#delete', function(){
        var id = $(this).data('id')
        $("#delete_link").attr("href", "/administrator/permukiman/remove/" + id)
    })
</script>
@endsection