<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Inventaris Aset Desa Sirnagalih 2025</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font-size: 10pt;
        }
        * {
            box-sizing: border-box;
            /* margin: 0; */
            /* padding: 0; */

        }
        .page {
            width: 297mm;
            min-height: 210mm;
            padding: 10mm;
            margin: 10mm auto;
            border: 1px solid #D3D3D3;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .subpage {
            padding: 1cm;
            /* border: 2px solid #000; */
            min-height: 190mm;
        }
        .header, .judul {
            text-align: center;
            margin-bottom: 10px;
        }
        .judul {
            font-weight: bold;
            font-size: 14pt;
        }
        .location-info {
            margin-left: 40px;
            font-size: 9pt;
        }
        .location-code {
            text-align: right;
            font-size: 9pt;
            margin-right: 40px;
            margin-top:20px;
        }
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .text-left {
            text-align: left;
        }
        .footer {
            background: #204b8c;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 9pt;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        /* Specific table styles */
        .table-aset {
            width: calc(100% - 80px);
            font-size: 9pt;

        }
        .table-tanah {
            width: calc(100% - 60px);
            font-size: 9pt;

        }
        .table-peralatan {
            width: calc(100% - 50px);
            font-size: 9pt;

        }
        .table-gedung {
            width: calc(100% - 40px);
            font-size: 8pt;

        }
        .table-jalan {
            width: calc(100% - 30px);
            font-size: 7pt;

        }
        .table-aset-lainnya {
            width: calc(100% - 70px);
            font-size: 9pt;

        }
        .table-konstruksi {
            width: calc(100% - 80px);
            font-size: 9pt;

        }

        h5{
            padding: 0;
            margin: 0;
            margin-top: 3px
        }
        @page {
            size: A4 landscape;
            margin: 10mm;
        }
        @media print {
            body, .page {
                width: 297mm;
                height: 210mm;
                margin: 0;
                padding: 0;
            }
            .page {
                border: none;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <div class="book">
        <div class="page">
            <div class="subpage">
                <h2 class="judul">BUKU INVENTARIS ASET DESA<br>PEMERINTAH DESA SIRNAGALIH<br>2025</h2>
                <h6 class="location-code">Kode Lokasi Desa: 32.06.27.2.2014</h6>
                <table class="table-aset">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Jenis Barang</th>
                            <th>Kode Barang</th>
                            <th>Identitas Barang</th>
                            <th colspan="3">Asal Usul Barang</th>
                            <th>Tanggal Perolehan</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>APBDesa</th>
                            <th>Perolehan Lain</th>
                            <th>Kekayaan Asli Desa</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noB = 1;
                        @endphp
                        @foreach ($aset as $d)
                            <tr>
                                <td>{{ $noB++ }}.</td>
                                <td class="text-left">{{ $d->rekening->nama_rekening }}</td>
                                <td>{{ $d->rekening->kode }}</td>
                                <td class="text-left">{{ $d->nama_label }}</td>
                                <td>{{ $d->asal == 'APBDesa' ? '✓' : '-' }}</td>
                                <td>{{ $d->asal == 'Perolehan Lain Yang Sah' ? '✓' : '-' }}</td>
                                <td>{{ $d->asal == 'Kekayaan Asli Desa' ? '✓' : '-' }}</td>
                                <td>{{ $d->tanggal_perolehan }}</td>
                                <td class="text-left">{{ $d->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="book">
        <div class="page">
            <div class="subpage">
                <h2 class="judul">KARTU INVENTARIS BARANG (KIB) A<br>TANAH<br>2025</h2>
                <div class="location-info">
                    <h5>PROVINSI: Jawa Barat</h5>
                    <h5>KABUPATEN/KOTA: Tasikmalaya</h5>
                    <h5>KECAMATAN: Cigalontang</h5>
                    <h5>NAMA: Tanah</h5>
                    <h5>DESA: Sirnagalih</h5>
                </div>
                <h6 class="location-code">Kode Lokasi Desa: 32.06.27.2.2014</h6>
                <table class="table-tanah">
                    <thead>
                        <tr>
                            <th colspan="3">NOMOR</th>
                            <th>Nama Barang</th>
                            <th>Luas (M²)</th>
                            <th>Tahun Perolehan</th>
                            <th>Letak/Alamat</th>
                            <th colspan="3">Status Tanah</th>
                            <th>Penggunaan</th>
                            <th>Cara Perolehan</th>
                            <th>Harga (Rp)</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Reg</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Hak</th>
                            <th>Sertifikat Tanggal</th>
                            <th>Nomor</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noT = 1;
                        @endphp
                        @foreach ($tanah as $d)
                            <tr>
                                <td>{{ $noT++ }}.</td>
                                <td class="text-left">{{ $d->aset->rekening->kode }}</td>
                                <td>{{ $d->aset->nomor_register }}</td>
                                <td class="text-left">{{ $d->aset->rekening->nama_rekening }}</td>
                                <td>{{ $d->luas }}</td>
                                <td>{{ $d->aset->tanggal_perolehan }}</td>
                                <td class="text-left">{{ $d->alamat }}</td>
                                <td class="text-left">{{ $d->hak }}</td>
                                <td>{{ $d->tanggal_sertifikat }}</td>
                                <td>{{ $d->nomor_sertifikat }}</td>
                                <td class="text-left">{{ $d->penggunaan }}</td>
                                <td class="text-left">{{ $d->perolehan }}</td>
                                <td>{{ $d->aset->nilai_perolehan }}</td>
                                <td class="text-left">{{ $d->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="book">
        <div class="page">
            <div class="subpage">
                <h2 class="judul">KARTU INVENTARIS BARANG (KIB) B<br>PERALATAN DAN MESIN<br>2025</h2>
                <div class="location-info">
                    <h5>PROVINSI: Jawa Barat</h5>
                    <h5>KABUPATEN/KOTA: Tasikmalaya</h5>
                    <h5>KECAMATAN: Cigalontang</h5>
                    <h5>NAMA: Peralatan dan Mesin</h5>
                    <h5>DESA: Sirnagalih</h5>
                </div>
                <h6 class="location-code">Kode Lokasi Desa: 32.06.27.2.2014</h6>
                <table class="table-peralatan">
                    <thead>
                        <tr>
                            <th colspan="3">NOMOR</th>
                            <th>Nama Barang</th>
                            <th>Merk/Type</th>
                            <th>Ukuran/CC</th>
                            <th>Bahan</th>
                            <th>Tahun Perolehan</th>
                            <th colspan="5">Nomor</th>
                            <th>Cara Perolehan/Kondisi</th>
                            <th>Harga (Rp)</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Reg</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Pabrik</th>
                            <th>Rangka</th>
                            <th>Mesin</th>
                            <th>Polisi</th>
                            <th>BPKB</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noP = 1;
                        @endphp
                        @foreach ($peralatan_dan_mesin as $d)
                            <tr>
                                <td>{{ $noP++ }}.</td>
                                <td class="text-left">{{ $d->aset->rekening->kode }}</td>
                                <td>{{ $d->aset->nomor_register }}</td>
                                <td class="text-left">{{ $d->aset->rekening->nama_rekening }}</td>
                                <td class="text-left">{{ $d->merk }}</td>
                                <td class="text-left">{{ $d->ukuran }}</td>
                                <td class="text-left">{{ $d->bahan }}</td>
                                <td>{{ $d->aset->tanggal_perolehan }}</td>
                                <td class="text-left">{{ $d->nomor_pabrik }}</td>
                                <td class="text-left">{{ $d->nomor_rangka }}</td>
                                <td class="text-left">{{ $d->nomor_mesin }}</td>
                                <td class="text-left">{{ $d->nomor_polisi }}</td>
                                <td class="text-left">{{ $d->nomor_bpkb }}</td>
                                <td class="text-left">{{ $d->perolehan }}</td>
                                <td>{{ $d->aset->nilai_perolehan }}</td>
                                <td class="text-left">{{ $d->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="book">
        <div class="page">
            <div class="subpage">
                <h2 class="judul">KARTU INVENTARIS BARANG (KIB) C<br>GEDUNG DAN BANGUNAN<br>2025</h2>
                <div class="location-info">
                    <h5>PROVINSI: Jawa Barat</h5>
                    <h5>KABUPATEN/KOTA: Tasikmalaya</h5>
                    <h5>KECAMATAN: Cigalontang</h5>
                    <h5>NAMA: Gedung dan Bangunan</h5>
                    <h5>DESA: Sirnagalih</h5>
                </div>
                <h6 class="location-code">Kode Lokasi Desa: 32.06.27.2.2014</h6>
                <table class="table-gedung">
                    <thead>
                        <tr>
                            <th colspan="3">NOMOR</th>
                            <th>Nama Barang</th>
                            <th>Tahun Perolehan</th>
                            <th>Kondisi (B,KB,RB)</th>
                            <th colspan="2">Konstruksi Bangunan</th>
                            <th>Luas Lantai (M²)</th>
                            <th>Letak/Alamat</th>
                            <th>Dokumen Gedung</th>
                            <th>Luas Tanah (M²)</th>
                            <th>Status Tanah</th>
                            <th>Kode Tanah</th>
                            <th>Cara Perolehan</th>
                            <th>Harga (Rp)</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Reg</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Bertingkat</th>
                            <th>Beton</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noG = 1;
                        @endphp
                        @foreach ($gedung_dan_bangunan as $d)
                            <tr>
                                <td>{{ $noG++ }}.</td>
                                <td class="text-left">{{ $d->aset->rekening->kode }}</td>
                                <td>{{ $d->aset->nomor_register }}</td>
                                <td class="text-left">{{ $d->aset->rekening->nama_rekening }}</td>
                                <td>{{ $d->aset->tanggal_perolehan }}</td>
                                <td class="text-left">{{ $d->aset->kondisi }}</td>
                                <th class="text-left">{{ $d->bertingkat }}</td>
                                <th class="text-left">{{ $d->beton }}</td>
                                <td>{{ $d->luas_lantai }}</td>
                                <td class="text-left">{{ $d->alamat }}</td>
                                <td class="text-left">{{ $d->no_dokumen }}</td>
                                <td>{{ $d->tanah->luas }}</td>
                                <td class="text-left">{{ $d->aset->kondisi }}</td>
                                <td class="text-left">{{ $d->tanah->aset->rekening->kode }}</td>
                                <td class="text-left">{{ $d->aset->asal }}</td>
                                <td>{{ $d->aset->nilai_perolehan }}</td>
                                <td class="text-left">{{ $d->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="book">
        <div class="page">
            <div class="subpage">
                <h2 class="judul">KARTU INVENTARIS BARANG (KIB) D<br>JALAN, IRIGASI DAN JARINGAN<br>2025</h2>
                <div class="location-info">
                    <h5>PROVINSI: Jawa Barat</h5>
                    <h5>KABUPATEN/KOTA: Tasikmalaya</h5>
                    <h5>KECAMATAN: Cigalontang</h5>
                    <h5>NAMA: Jalan, Irigasi dan Jaringan</h5>
                    <h5>DESA: Sirnagalih</h5>
                </div>
                <h6 class="location-code">Kode Lokasi Desa: 32.06.27.2.2014</h6>
                <table class="table-jalan">
                    <thead>
                        <tr>
                            <th colspan="3">Nomor</th>
                            <th>Nama Barang</th>
                            <th>Tahun Perolehan</th>
                            <th>Konstruksi</th>
                            <th>Panjang (M)</th>
                            <th>Lebar (M/cm)</th>
                            <th>Tinggi</th>
                            <th>Luas (M²)</th>
                            <th>Alamat</th>
                            <th colspan="2">Dokumen</th>
                            <th>Status Tanah</th>
                            <th>Kode Tanah</th>
                            <th>Cara Perolehan</th>
                            <th>Kondisi (B,KB,RB)</th>
                            <th>Harga (Rp)</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Reg</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Tanggal</th>
                            <th>Nomor</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noJ = 1;
                        @endphp
                        @foreach ($jalan_irigasi_dan_jaringan as $d)
                            <tr>
                                <td>{{ $noJ++ }}.</td>
                                <td class="text-left">{{ $d->aset->rekening->kode }}</td>
                                <td>{{ $d->aset->nomor_register }}</td>
                                <td class="text-left">{{ $d->aset->rekening->nama_rekening }}</td>
                                <td>{{ $d->aset->tanggal_perolehan }}</td>
                                <td class="text-left">{{ $d->kontruksi }}</td>
                                <td class="text-left">{{ $d->panjang }}</td>
                                <td class="text-left">{{ $d->lebar }}</td>
                                <td>{{ $d->tinggi }}</td>
                                <td>{{ $d->luas }}</td>
                                <td class="text-left">{{ $d->lokasi }}</td>
                                <td>{{ $d->tanggal_dokumen }}</td>
                                <td class="text-left">{{ $d->no_dokumen }}</td>
                                <td class="text-left">{{ $d->tanah->aset->kondisi }}</td>
                                <td class="text-left">{{ $d->tanah->aset->rekening->kode }}</td>
                                <td class="text-left">{{ $d->tanah->aset->asal }}</td>
                                <td class="text-left">{{ $d->tanah->aset->kondisi }}</td>
                                <td>{{ $d->aset->nilai_perolehan }}</td>
                                <td class="text-left">{{ $d->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="book">
        <div class="page">
            <div class="subpage">
                <h2 class="judul">KARTU INVENTARIS BARANG (KIB) E<br>ASET TETAP LAINNYA<br>2025</h2>
                <div class="location-info">
                    <h5>PROVINSI: Jawa Barat</h5>
                    <h5>KABUPATEN/KOTA: Tasikmalaya</h5>
                    <h5>KECAMATAN: Cigalontang</h5>
                    <h5>NAMA: Aset Tetap Lainnya</h5>
                    <h5>DESA: Sirnagalih</h5>
                </div>
                <h6 class="location-code">Kode Lokasi Desa: 32.06.27.2.2014</h6>
                <table class="table-aset-lainnya">
                    <thead>
                        <tr>
                            <th colspan="3">NOMOR</th>
                            <th>Nama Barang</th>
                            <th>Ruang</th>
                            <th>Judul</th>
                            <th>Pencipta</th>
                            <th>Ukuran</th>
                            <th>Bahan</th>
                            <th>Tahun Perolehan</th>
                            <th>Asal/Cara Perolehan</th>
                            <th>Sumber Dana</th>
                            <th>Kondisi</th>
                            <th>Harga (Rp)</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Reg</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noAL = 1;
                        @endphp
                        @foreach ($aset_tetap_lainnya as $d)
                            <tr>
                                <td>{{ $noAL++ }}.</td>
                                <td class="text-left">{{ $d->aset->rekening->kode }}</td>
                                <td>{{ $d->aset->nomor_register }}</td>
                                <td class="text-left">{{ $d->aset->rekening->nama_rekening }}</td>
                                <td class="text-left">{{ $d->ruang }}</td>
                                <td class="text-left">{{ $d->judul }}</td>
                                <td class="text-left">{{ $d->pencipta }}</td>
                                <td class="text-left">{{ $d->ukuran }}</td>
                                <td class="text-left">{{ $d->bahan }}</td>
                                <td>{{ $d->aset->tanggal_perolehan }}</td>
                                <td class="text-left">{{ $d->aset->asal }}</td>
                                <td class="text-left">{{ $d->aset->sumber_dana }}</td>
                                <td class="text-left">{{ $d->aset->kondisi }}</td>
                                <td>{{ $d->aset->nilai_perolehan }}</td>
                                <td class="text-left">{{ $d->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="book">
        <div class="page">
            <div class="subpage">
                <h2 class="judul">KARTU INVENTARIS BARANG (KIB) F<br>KONSTRUKSI DALAM PENGERJAAN<br>2025</h2>
                <div class="location-info">
                    <h5>PROVINSI: Jawa Barat</h5>
                    <h5>KABUPATEN/KOTA: Tasikmalaya</h5>
                    <h5>KECAMATAN: Cigalontang</h5>
                    <h5>NAMA: Konstruksi Dalam Pengerjaan</h5>
                    <h5>DESA: Sirnagalih</h5>
                </div>
                <h6 class="location-code">Kode Lokasi Desa: 32.06.27.2.2014</h6>
                <table class="table-konstruksi">
                    <thead>
                        <tr>
                            <th colspan="3">NOMOR</th>
                            <th>Nama Barang</th>
                            <th>Nomor Dokumen</th>
                            <th>Tanggal Dokumen</th>
                            <th>Tahun Perolehan</th>
                            <th>Asal/Cara Perolehan</th>
                            <th>Sumber Dana</th>
                            <th>Kondisi</th>
                            <th>Harga (Rp)</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Reg</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noK = 1;
                        @endphp
                        @foreach ($kontruksi_dalam_pengerjaan as $d)
                            <tr>
                                <td>{{ $noK++ }}.</td>
                                <td class="text-left">{{ $d->aset->rekening->kode }}</td>
                                <td>{{ $d->aset->nomor_register }}</td>
                                <td class="text-left">{{ $d->aset->rekening->nama_rekening }}</td>
                                <td class="text-left">{{ $d->nomor_dokumen }}</td>
                                <td>{{ $d->tanggal_dokumen }}</td>
                                <td>{{ $d->aset->tanggal_perolehan }}</td>
                                <td class="text-left">{{ $d->aset->asal }}</td>
                                <td class="text-left">{{ $d->aset->sumber_dana }}</td>
                                <td class="text-left">{{ $d->aset->kondisi }}</td>
                                <td>{{ $d->aset->nilai_perolehan }}</td>
                                <td class="text-left">{{ $d->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>