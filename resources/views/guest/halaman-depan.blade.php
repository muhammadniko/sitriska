@extends('layout.guest')
@section('title', 'SI TRISKA - BPBD Kota Banjarmasin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #333">
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <h1 class="" style="color: #fff; font-size: 52px;">SI-TRISKA</h1>
            <p class="" style="color: #fff; font-size: 16px;">
                Sistem Informasi Pemataan Tingkat Risiko Kebakaran<br>
                Permukiman di Kota Banjarmasin<br>
                Berbasis GIS (Geographic Information System)
            </p>
            <p class=""><a href="{{url('/peta-zonasi')}}" class="btn btn-lg btn-primary">Lihat Peta Risiko Kebakaran</a></p>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection