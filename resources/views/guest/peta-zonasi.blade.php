@extends('layout.guest')
@section('title', 'SI TRISKA - BPBD Kota Banjarmasin')
    
@section('head-script')
    <script src="http://maps.googleapis.com/maps/api/js"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div id="petaBanjarmasin" style="width:100%;height:520px;">Tidak Terhubung Ke Internet</div>
    <div class="legends-box" style="position: relative;">
        <div class="legends navbar-fixed-bottom bg-primary" style="padding: 10px; position: absolute!important;">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-xs-12 text-center"><b>Indeks Tingkat Risiko</b></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 bg-green" style="height: 20px;"></div>
                        <div class="col-xs-4 bg-yellow" style="height: 20px;"></div>
                        <div class="col-xs-4 bg-red" style="height: 20px;"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-center">Rendah</div>
                        <div class="col-xs-4 text-center">Sedang</div>
                        <div class="col-xs-4 text-center">Tinggi</div>
                    </div>
                </div>
                <div class="col-md-9">
                    <p class="text-right" style="padding: 15px;">Klik area permukiman pada Peta untuk informasi lebih detail</p>
                </div>
        </div>
    </div>
       
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script src="{{ asset("/dist/js/maps-config.js") }}"></script>
<script>
	function initialize() {  
        var map = new google.maps.Map(document.getElementById("petaBanjarmasin"), setPeta)
        var list = @json($listOfScore)

        
        list.forEach(function(item) {
            let center = {lat: parseFloat(item.lokasi.latitude), lng: parseFloat(item.lokasi.langitude)}
            let color = item.risk_levels.color
            let luas = item.lokasi.luas_area
            
            let cityCircle = createCircle(map, center, color, luas)
            
            let content = '<b>Kelurahan ' + item.lokasi.kelurahan + '</b>' +
                '<br> Kecamatan ' + item.lokasi.kecamatan +
                '<br> Luas Wilayah ' + item.lokasi.luas_area + ' KM<sup>2</sup>' +
                '<br> Risiko Kebakaran ' + item.tingkat_risiko
            
            google.maps.event.addListener(cityCircle, "click", function(e) {
                createInfoWindow(map, content, this.getCenter())
            })
        })
    }
    
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection