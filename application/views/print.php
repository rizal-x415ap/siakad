<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kartu Rencana Studi</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/dist'); ?>/assets/compiled/css/app.css">
    <style>
        body {
            margin: 0;
            font-family: 'Times New Roman', Times, serif, sans-serif;
            font-size: 14px;
        }
        .container-fluid {
            padding: 10px; 
        }
        .cop-line {
            border-top: 3px solid #000;
            margin: 5px;
            width: 100%;
        }
        .underline-text {
            text-decoration: underline;
        }
        .table-bordered {
            border-collapse: collapse;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #000;
            padding: 8px;
        }
        .logo img {
            width: 100%;
        }
        th,td{
          padding: 5px !important;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <header class="d-flex">
            <div class="logo col-2 align-items-center p-3">
                <img src="<?php echo base_url('assets/files/logo/').'logostikom.png'?>" alt="">
            </div>
            <div class="col-10 text-center p-3">
                <h4>SEKOLAH TINGGI ILMU KOMPUTER</h4>
                <h3>STIKOM TUNAS BANGSA PEMATANG SIANTAR</h3>
                <h5>SK. MENDIKBUD R.I NO. 513/E/O/2022 Tanggal 13 Juli 2022</h5>
            </div>
        </header>
        <div class="cop-line"></div>
        <div class="row text-center">
            <h3 class="underline-text">KARTU RENCANA STUDI (KRS)</h3>
        </div>
        <section>
            <div class="row m-3 border border-dark border-2 p-2">
                <div class="col-2">
                    <img class="w-100" src="<?php echo base_url('assets/files/foto/').$photo?>" alt="">
                </div>
                <div class="col-10">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td>Nim</td>
                            <td>:</td>
                            <td><?php echo $nim ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?php echo $nama_lengkap ?></td>
                        </tr>
                        <tr>
                            <td>Prog. Studi</td>
                            <td>:</td>
                            <td><?php echo $prodi ?></td>
                        </tr>
                        <tr>
                            <td>Thn. Akademik</td>
                            <td>:</td>
                            <td><?php echo $tahun_akademik ?></td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            <td><?php echo $semester ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <section>
            <div class="row m-3 border border-dark border-2">
                <table class="table table-bordered table-sm m-0">
                    <thead class="table-secondary">
                        <tr class="text-center">
                            <th>No</th>
                            <th>KODE</th>
                            <th>MATAKULIAH</th>
                            <th>SKS</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        $jumlahSks = 0;
                        foreach ($krs_data as $krs) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $krs->kode_matakuliah ?></td>
                                <td class="text-start"><?= $krs->nama_matakuliah ?></td>
                                <td><?= $krs->sks;
                                    $jumlahSks += $krs->sks; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="border-top border-2 border-dark">
                            <td></td>
                            <td colspan="2" align="center"><strong>Jumlah Kredit yang diambil</strong></td>
                            <td><?php echo $jumlahSks; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section>
            <div class="row m-3 ">
                <div class="col-6">
                    <p>Disetujui Oleh:</p>
                    <p>Penasehat Akademik,</p>
                    <br>
                    <br>
                    <p>ILHAM SYAHPUTRA SARAGIH, S.SOS., M.M</p>
                </div>
                <div class="col-6">
                    <p>Pematangsiantar, 20 September 2022 </p>
                    <p>Mahasiswa,</p>
                    <br>
                    <br>
                    <p>RIZAL EFENDI</p>
                </div>
            </div>
        </section>
        <section>
            <div class="row m-3">
                <div class="col-12 text-center">
                    <p>Disahkan oleh: </p>
                    <p>KETUA PROGRAMSTUDI STRATA 1 - SISTEM INFORMASI</p>
                    <br>
                    <br>
                    <p>IRFAN SUDAHRI DAMANIK, M.KOM</p>
                </div>
            </div>
        </section>
        <section>
            <div class="row m-3 ">
                <div class="col-12 text-center text-success">
                    <h5>KARTU RENCANA STUDI (KRS)</h5>
                    <h5>KARTU HASIL STUDI (KHS)</h5>
                </div>
            </div>
        </section>
    </div>
</body>
<script>
    window.print();
</script>
</html>
