<table>
    <thead>
        <tr>
            <th style="font-family: serif; text-align: center; font-weight: bold;" colspan="9">DATA TINGKAT RISIKO KEBAKARAN PERMUKIMAN</th>
        </tr>
        <tr>
            <th style="font-family: serif; text-align: center; font-weight: bold;" colspan="9">DI KECAMATAN {{ $header }}</th>
        </tr>
        <tr>
            <th style="font-family: serif; text-align: center; font-weight: bold;" colspan="9">BPBD KOTA BANJARMASIN</th>
        </tr>
        <tr>
            <th style="font-family: serif; text-align: center; font-weight: bold;" colspan="9"> </th>
        </tr>
        <tr>
            <th height="50" width="5" style="font-family: serif; text-align: center; font-weight: bold;">No</th>
            <th width="20" style="font-family: serif; text-align: center; font-weight: bold;">Kelurahan</th>
            <th width="25" style="font-family: serif; text-align: center; font-weight: bold;">Kecamatan</th>
            <th width="12" style="word-wrap: break-word; font-family: serif; text-align: center; font-weight: bold;">Luas Wilayah (KM2)</th>
            <th width="12" style="word-wrap: break-word; font-family: serif; text-align: center; font-weight: bold;">Indeks Bahaya</th>
            <th width="15" style="word-wrap: break-word; font-family: serif; text-align: center; font-weight: bold;">Indeks Kerentanan</th>
            <th width="15" style="word-wrap: break-word; font-family: serif; text-align: center; font-weight: bold;">Indeks Ketahanan</th>
            <th width="12" style="word-wrap: break-word; font-family: serif; text-align: center; font-weight: bold;">Besaran Risiko</th>
            <th width="20" style="font-family: serif; text-align: center; font-weight: bold;">Tingkat Risiko</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($listOfScore as $score)
        <tr>
            <!-- Ambil Data Lokasi -->
            <td style="font-family: serif; text-align: center;">{{ $no++ }}</td>
            <td style="font-family: serif; text-align: center;">{{ $score->lokasi->kelurahan }}</td>
            <td style="font-family: serif; text-align: center;">{{ $score->lokasi->kecamatan }}</td>
            <td style="font-family: serif; text-align: center;">{{ $score->lokasi->luas_area }}</td>
            <td style="font-family: serif; text-align: center;">{{ $score->skor_ancaman }}</td>
            <td style="font-family: serif; text-align: center;">{{ $score->skor_kerentanan }}</td>
            <td style="font-family: serif; text-align: center;">{{ $score->skor_ketahanan }}</td>
            <td style="font-family: serif; text-align: center;">{{ $score->skor_akhir }}</td>
            <td style="font-family: serif; text-align: center;">{{ $score->tingkat_risiko }}</td>
        </tr>
        @endforeach
    </tbody>
</table>