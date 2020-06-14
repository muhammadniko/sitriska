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
        <div id="petaBanjarmasin" style="width:720px;height:400px;">Tidak Terhubung Ke Internet</div>
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
        var list = @json($listOfLokasi)
        
        console.log(list)
        
        list.forEach(function(item) {
            var center = {lat: parseFloat(item.latitude), lng: parseFloat(item.langitude)}
            
            var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: center,
            radius: (item.luas_area*100)+235
          })
        })
    }
    
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection