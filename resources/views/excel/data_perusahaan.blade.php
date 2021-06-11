<!doctype html>
<html lang="en">
<head>
    <style>
     @page{
         size: F4 landscape;
     }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perusahaan PDF</title>
</head>
<body>

<div class="container" style="text-align: center;">
    <h3>DATA PERUSAHAAN PADA LINGKUNGAN KOTA TANGERANG SELATAN</h3>
    <h3>DINAS  KETENAGAKERJAAN  KOTA TANGERANG SELATAN PROVINSI BANTEN</h3>
    <h3>TAHUN 2019</h3>

</div>
<div>
    <table border="1" >
        <thead>
        
        <tr style="height: 30px; color: yellow;">
            <th rowspan="2" style="background-color: black;" >NO.</th>
            <th rowspan="2" style="background-color: #00008B;">NAMA PERUSAHAAN</th>
            <th rowspan="2" style="background-color: red;">ALAMAT</th>
            <th rowspan="2" style="background-color: #00008B;">TELEPON</th>
            <th rowspan="2" style="background-color: red;">JENIS USAHA</th>
            <th rowspan="2" style="background-color: #00008B;">NAMA PEMILIK/PENGURUS</th>
            <th rowspan="2" style="background-color: red;">TANGGAL PENDIRIAN</th>
            <th rowspan="2" style="background-color: #00008B;">NO AKTE PENDIRIAN</th>
            <th rowspan="2" style="background-color: red;">TANGGAL</th>
            <th rowspan="2" style="background-color: #00008B;">KLUI</th>
            <th colspan="3" style="background-color: red;">TKI</th>
            <th colspan="3" style="background-color: #00008B;">TKA</th>
            <th colspan="4" style="background-color: red;">STATUS PERMODALAN</th>
            <th colspan="4" style="background-color: #00008B;">JAMSOSTEK</th>
            <th colspan="8" style="background-color: red;">PERANGKAT HUB INDUSTRIAL</th>
            <th colspan="14" style="background-color: #00008B;">PENGGUNAAN ALAT DAN BAHAN</th>
        </tr>
        <tr style="color: yellow;">
            <th style="background-color: red;">L</th>
            <th style="background-color: red;">P</th>
            <th style="background-color: red;">TOTAL</th>
            <th style="background-color: #00008B;">L</th>
            <th style="background-color: #00008B;">P</th>
            <th style="background-color: #00008B;">TOTAL</th>
            
            <th style="background-color: red;">PMDN</th>
            <th style="background-color: red;"> PMA</th>
            <th style="background-color: red;">SWASNAS</th>
            <th style="background-color: red;">JOIN</th>

            <th style="background-color: #696969;">JKK</th>
            <th style="background-color: #696969;">JK</th>
            <th style="background-color: #696969;">JHT</th>
            <th style="background-color: #696969;">JPK</th>
            <th style="background-color: red;">PK</th>
            <th style="background-color: red;">PP</th>
            <th style="background-color: red;">PKB</th>
            <th style="background-color: red;">BIPARTIT</th>
            <th style="background-color: red;">SPTP</th>
            <th style="background-color: red;">UK SPSI</th>
            <th style="background-color: red;">P2K3</th>
            <th style="background-color: red;">APINDO</th>
            <th style="background-color: #00008B;">PU</th>
            <th style="background-color: #00008B;">PA</th>
            <th style="background-color: #00008B;">PAU</th>
            <th style="background-color: #00008B;">AAB</th>
            <th style="background-color: #00008B;">MD</th>
            <th style="background-color: #00008B;">PP</th>
            <th style="background-color: #00008B;">IPK</th>
            <th style="background-color: #00008B;">IL</th>
            <th style="background-color: #00008B;">PL</th>
            <th style="background-color: #00008B;">LIFT</th>
            <th style="background-color: #00008B;">BT</th>
            <th style="background-color: #00008B;">BBB</th>
            <th style="background-color: #00008B;">TRB</th>
            <th style="background-color: #00008B;">BB</th> 
        </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
        @foreach($perusahaan as $p)
        
        <tr>
            <td>{{$i++}}</td>
            <td>{{$p->nama_perusahaan}}</td>
            <td>{{$p->alamat}},{{$p->kel->n_kelurahan}},{{$p->kec->n_kecamatan}},{{$p->kab->n_kabupaten}},{{$p->prov->n_provinsi}}</td>
            <td>{{$p->telepon}}</td>
            <td>{{$p->jenis_usaha}}</td>
            <td>{{$p->nama_pemilik}}</td>
            <td>{{$p->tanggal_pendirian}}</td>
            <td>{{$p->no_akta}}</td>
            <td>{{$p->tanggal}}</td>
            <td>{{$p->klui}}</td>
            <td>{{$p->laki_laki_tki}}</td>
            <td>{{$p->perempuan_tki}}</td>
            <td>{{$p->laki_laki_tki+$p->perempuan_tki}}</td>
            <td>{{$p->laki_laki_tka}}</td>
            <td>{{$p->perempuan_tka}}</td>
            <td>{{$p->laki_laki_tka+$p->perempuan_tka}}</td>
       
            @if($p->status_permodalan == 1)
            <td>{{$pmbn->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->status_permodalan == 2)
            <td>{{$pma->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->status_permodalan == 3)
            <td>{{$swasnas->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->status_permodalan == 4)
            <td>{{$join->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif
        
            
            @if($p->jamsostek == 1)
            <td>{{$jkk->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->jamsostek == 2)
            <td>{{$jk->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->jamsostek == 3)
            <td>{{$jht->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->jamsostek == 4)
            <td>{{$jpk->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->ph_industrial == 1)
            <td>{{$pk->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->ph_industrial == 2)
            <td>{{$pp->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->ph_industrial == 3)
            <td>{{$pkb->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->ph_industrial == 4)
            <td>{{$bipartit->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->ph_industrial == 5)
            <td>{{$sptp->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->ph_industrial == 6)
            <td>{{$ukspsi->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->ph_industrial == 7)
            <td>{{$p2k3->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->ph_industrial == 8)
            <td>{{$apindo->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif
          
            @if($p->penggunaan_alatbahan == 1)
            <td>{{$pu->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 2)
            <td>{{$pa->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 3)
            <td>{{$pau->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 4)
            <td>{{$aab->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 5)
            <td>{{$md->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 6)
            <td>{{$pp_1->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 7)
            <td>{{$ipk->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 8)
            <td>{{$il->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 9)
            <td>{{$pl->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 10)
            <td>{{$lift->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 11)
            <td>{{$bt->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 12)
            <td>{{$bbb->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 13)
            <td>{{$rtb->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

            @if($p->penggunaan_alatbahan == 14)
            <td>{{$bb->count() > 0 ? 1 : 0}}</td>
            @else
            <td></td>
            @endif

        </tr>
        @endforeach
        </tbody>
    </table>
</div>
    

</body>
</html>

@php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_pendapatan.xls");
@endphp



