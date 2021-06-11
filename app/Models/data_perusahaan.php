<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_perusahaan extends Model
{
   protected $tablle = 'data_perusahaan';
   protected $fillable = ['id', 'nama_perusahaan', 'alamat', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan',
    'telepon', 'jenis_usaha', 'nama_pemilik', 'tanggal_pendirian', 'no_akta', 'tanggal', 'klui', 'laki_laki_tki',
    'perempuan_tki', 'laki_laki_tka', 'perempuan_tka', 'status_permodalan', 'jamsostek', 'ph_industrial', 'penggunaan_alatbahan'];

    public function kec(){
        return $this->belongsTo(kecamatan::class, 'kecamatan');
    }
    public function kel(){
        return $this->belongsTo(kelurahan::class, 'kelurahan');
    }
    public function kab(){
        return $this->belongsTo(kabupaten::class, 'kabupaten');
    }
    public function prov(){
        return $this->belongsTo(provinsi::class, 'provinsi');
    }

}
