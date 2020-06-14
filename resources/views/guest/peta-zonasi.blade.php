@extends('layout.guest')
@section('title', 'SI TRISKA - BPBD Kota Banjarmasin')
    
@section('head-script')
    <script src="http://maps.googleapis.com/maps/api/js"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div id="petaBanjarmasin" style="width:800px;height:520px;">Tidak Terhubung Ke Internet</div>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      
    </section>
    <!-- /.content -->
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
            var center = {lat: parseFloat(item.lokasi.latitude), lng: parseFloat(item.lokasi.langitude)}
            
            var cityCircle = new google.maps.Circle({
            strokeColor: item.risk_levels.color,
            strokeOpacity: 0.35,
            strokeWeight: 2,
            fillColor: item.risk_levels.color,
            fillOpacity: 0.35,
            map: map,
            center: center,
            radius: (item.lokasi.luas_area*100)+235
          })
        })
    }
    
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection