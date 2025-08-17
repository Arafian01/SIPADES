<!DOCTYPE html>
<html>
<head>
    <title>Cetak Semua Laporan</title>
    <style>
        @page { size: A4 landscape; margin: 10mm; }
        body { font-family: Tahoma, sans-serif; margin: 0; }
        .page-break { page-break-before: always; }
    </style>
</head>
<body>
    @include('buku.printLaporan', ['data' => $aset])

    <div class="page-break"></div>
    @include('golongan.printLaporanTanah', ['data' => $tanah])

    <div class="page-break"></div>
    @include('golongan.printLaporanRekening', ['data' => $rekening])

    <div class="page-break"></div>
    @include('golongan.printLaporanPeralatan', ['data' => $peralatan_dan_mesin])

    <div class="page-break"></div>
    @include('golongan.printLaporanKonstruksi', ['data' => $kontruksi_dalam_pengerjaan])

    <div class="page-break"></div>
    @include('golongan.printLaporanJalan', ['data' => $jalan_irigasi_dan_jaringan])

    <div class="page-break"></div>
    @include('golongan.printLaporanGedung', ['data' => $gedung_dan_bangunan])

    <div class="page-break"></div>
    @include('golongan.printLaporanAsetLain', ['data' => $aset_tetap_lainnya])
</body>
</html>