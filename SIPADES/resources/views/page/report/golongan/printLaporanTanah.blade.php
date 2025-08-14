<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku inventaris aset Desa</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 10pt "Tahoma";
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            outline: 2cm #FFEAEA solid;
        }

        td {
            padding-top: 5px;
        }

        .kp {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .logo {
            text-align: center;
            font-size: small;
        }

        .text {
            text-align: center;
            margin-top: 15px;
        }

        .cntr {
            font-size: small;
            text-align: left;
            margin-left: 40px;
            margin-right: 40px;
        }

        .translation {
            display: block;
            font-size: small;
            margin-top: -9px;
            font-style: italic;
        }

        table {
            border-collapse: collapse;
            margin-left: 40px;
            margin-right: 40px;
            margin-top: 40px;
            width: 100%;
            /* Ensure table takes full width */
        }

        .ini {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            font-size: small;
            padding: 0;
        }

        .ttd {
            text-align: left;
            font-size: small;
            padding: 0px;
            margin-top: -10px;
            font-style: italic;
        }

        .ttd1 {
            text-align: left;
            font-size: small;
            padding: 0px;
        }

        .left {
            padding-left: 10px;
        }

        .footer {
            background: #204b8c;
            color: #fff;
            text-align: center;
            font-size: small;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .ket {
            margin-left: 290px;
        }

        body {
            font-family: 'Tahoma';
        }

        .tengah {
            text-align: center;
        }

        .judul {
            text-align: center;
            font: bolder;
            margin-top: 10px;
        }

        .page {
            width: 297mm;
            /* Adjusted for A4 landscape width */
            min-height: 210mm;
            /* Adjusted for A4 landscape height */
            padding: 0mm;
            margin: 0mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .page::before {
            content: "";
            top: 0;
            left: 0;
            width: 189px;
            height: 189px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .page::after {
            content: "";
            bottom: 0;
            right: 0;
            width: 794px;
            height: 49px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @page {
            size: A4 landscape;
            /* Change to landscape */
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 297mm;
                /* Adjusted for A4 landscape width */
                height: 210mm;
                /* Adjusted for A4 landscape height */
            }

            .page {
                padding: 0mm;
                margin: 0mm auto;
                border: 1 px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                position: relative;
            }

            .page::before {
                content: "";
                top: 0;
                left: 0;
                width: 189px;
                height: 189px;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .page::after {
                content: "";
                bottom: 0;
                right: 0;
                width: 794px;
                height: 49px;
                background-size: cover;
                background-repeat: no-repeat;
            }

            @media print {
                .title {
                    font-weight: bold;
                }
            }

        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="book">
        <div class="page" id="result">
            <div class="ml-[6px] mr-[90px]">
                <h2 class="judul">KARTU INVENTARIS BARANG (KIB) A<br>TANAH<br>2025</h2>
                <div class="ml-10">
                    <h6>PROVINSI : Jawa Barat</h6>
                    <h6>KABUPATEN/KOTA : Tasikmalaya</h6>
                    <h6>KECAMATAN : Cigalontang</h6>
                    <h6>NAMA : Tanah</h6>
                    <h6>DESA : Sirnagalih</h6>
                </div>
                <h6 class="text-right">Kode Lokasi Desa : 32.06.27.2.2014</h6>
                <table class="border border-1 border-black w-full">
                    <thead>
                        <tr>
                            <th class="border border-1 border-black" colspan="3">NOMOR</th>
                            <th class="border border-1 border-black" rowspan="3">Nama Barang</th>
                            <th class="border border-1 border-black" rowspan="3">Luas<br>(M2)</th>
                            <th class="border border-1 border-black" rowspan="3">Tahun<br>Perolehan</th>
                            <th class="border border-1 border-black" rowspan="3">Letak/Alamat</th>
                            <th class="border border-1 border-black" colspan="3">Status Tanah</th>
                            <th class="border border-1 border-black" rowspan="3">Penggunaan</th>
                            <th class="border border-1 border-black" rowspan="3">Cara<br>Perolehan/Status<br>Barang
                            </th>
                            <th class="border border-1 border-black" rowspan="3">Harga/Rp</th>
                            <th class="border border-1 border-black" rowspan="3">Keterangan</th>
                        </tr>
                        <tr class="kp">
                            <td class="border border-1 border-black" rowspan="2">No</td>
                            <td class="border border-1 border-black" rowspan="2">Kode<br>Barang</td>
                            <td class="border border-1 border-black" rowspan="2">Reg</td>
                            <td class="border border-1 border-black" rowspan="2">Hak</td>
                            <td class="border border-1 border-black">Sertifikat</td>
                            <td class="border border-1 border-black" rowspan="2">Nomor</td>
                        </tr>
                        <tr class="kp">
                            <td class="border border-1 border-black">Tanggal</td>
                        </tr>
                        <tr class="kp">
                            <td class="border border-1 border-black">1</td>
                            <td class="border border-1 border-black">2</td>
                            <td class="border border-1 border-black">3</td>
                            <td class="border border-1 border-black">4</td>
                            <td class="border border-1 border-black">5</td>
                            <td class="border border-1 border-black">6</td>
                            <td class="border border-1 border-black">7</td>
                            <td class="border border-1 border-black">8</td>
                            <td class="border border-1 border-black">9</td>
                            <td class="border border-1 border-black">10</td>
                            <td class="border border-1 border-black">11</td>
                            <td class="border border-1 border-black">12</td>
                            <td class="border border-1 border-black">13</td>
                            <td class="border border-1 border-black">14</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $d)
                            <tr>
                                <td class="border border-1 border-black tengah">{{ $no++ }}.</td>
                                <td class="border border-1 border-black text-left pl-2">
                                    {{ $d->aset->rekening->kode }}</td>
                                <td class="border border-1 border-black pl-2 tengah">{{ $d->aset->nomor_register }}</td>
                                <td class="border border-1 border-black text-left pl-2">{{ $d->aset->rekening->nama_rekening }}</td>
                                <td class="border border-1 border-black text-left pl-2">{{ $d->luas }}</td>
                                <td class="border border-1 border-black pl-2">{{ $d->aset->tanggal_perolehan }}</td>
                                <td class="border border-1 border-black pl-2">{{ $d->alamat }}</td>
                                <td class="border border-1 border-black pl-2"></td>
                                <td class="border border-1 border-black pl-2">{{ $d->tanggal_sertifikat }}</td>
                                <td class="border border-1 border-black pl-2">{{ $d->nomor_sertifikat }}</td>
                                <td class="border border-1 border-black pl-2"></td>
                                <td class="border border-1 border-black pl-2">{{ $d->perolehan }}</td>
                                <td class="border border-1 border-black pl-2">{{ $d->aset->nilai_perolehan }}</td>
                                <td class="border border-1 border-black pl-2">{{ $d->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    // window.print();
</script>
