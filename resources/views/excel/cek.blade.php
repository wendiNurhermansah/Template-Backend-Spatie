<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th colspan="4">
                SUMBER DANA<br>
                PENGHASILAN TERKAIT PEKERJAAN/JABATAN {{ date('Y') }}
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="4">Dicetak Pada Tanggal :
                {{ Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d F Y H:i:s') }}</td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th>No</th>
            <th>Pemilik</th>
            <th>Jumlah Aset</th>
            <th>Pendapatan</th>
        </tr>
    </thead>
    <tbody>
       
        <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
       
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td colspan="2" align="center">Total</td>
            <td>-</td>
        </tr>
    </tfoot>
</table>

@php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_pendapatan.xls");
@endphp