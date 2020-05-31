@extends('layout.guest')
@section('title', 'Grafik Tingkat Risiko Kebakaran Permukiman - SI TRISKA')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      Grafik Tingkat Risiko Kebakaran Permukiman
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <h1>Banjarmasin Utara</h1>
        Tingkat Risiko Tinggi {{ $BanjarmasinUtara['Tinggi'] }}
        Tingkat Risiko Sedang {{ $BanjarmasinUtara['Sedang'] }}
        Tingkat Risiko Rendah {{ $BanjarmasinUtara['Rendah'] }}
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection