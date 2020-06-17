<table>
    <thead>
        <tr>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Besaran Risiko</th>
            <th>Tingkat Risiko</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listOfScore as $score)
        <tr>
            <!-- Ambil Data Lokasi -->
            <td>{{ $score->lokasi->kelurahan }}</td>
            <td>{{ $score->lokasi->kecamatan }}</td>
            <td>{{ $score->skor_akhir }}</td>
            <td>{{ $score->tingkat_risiko }}</td>
        </tr>
        @endforeach
    </tbody>
</table>