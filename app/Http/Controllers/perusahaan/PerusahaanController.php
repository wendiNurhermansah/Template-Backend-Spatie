<?php

namespace App\Http\Controllers\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_perusahaan;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Exports\PerusahaanExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

use DataTables;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::select('id', 'n_provinsi')->get();
        return view('perusahaan.Data_perusahaan', compact('provinsi'));
    }

    public function api(){
        $perusahaan = data_perusahaan::all();

        

        return DataTables::of($perusahaan)
            ->addColumn('action', function ($p) {
                return "
                <a href='" . route( 'Perusahaan.data_perusahaan.export_excel', $p->id) . "'  class='text-primary p-1' title='download'><i class='icon-download'></i></a>
               
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger p-1' title='Hapus data Pegawai'><i class='icon-remove'></i></a>";
            })
            
                

            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function kabupatenByProvinsi($provinsi_id)
    {
        return Kabupaten::select('id', 'n_kabupaten')->where('provinsi_id', $provinsi_id)->get();
    }

    public function kecamatanByKabupaten($kabupaten_id)
    {
        return Kecamatan::select('id', 'n_kecamatan')->where('kabupaten_id', $kabupaten_id)->get();
    }

    public function kelurahanByKecamatan($kecamatan_id)
    {
        return Kelurahan::select('id', 'n_kelurahan')->where('kecamatan_id', $kecamatan_id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'telepon' => 'required',
            'jenis_usaha' => 'required',
            'nama_pemilik' => 'required',
            'tanggal_pendirian' => 'required',
            'no_akta' => 'required',
            'tanggal' => 'required',
            'klui' => 'required',
            'laki_laki_tki' => 'required',
            'perempuan_tki' => 'required',
            'laki_laki_tka' => 'required',
            'perempuan_tka' => 'required',
            'status_permodalan' => 'required',
            'jamsostek' => 'required',
            'ph_industrial' => 'required',
            'penggunaan_alatbahan' => 'required',
        ]);

        $data_perusahaan = new data_perusahaan();
        $data_perusahaan -> nama_perusahaan = $request->nama_perusahaan;
        $data_perusahaan -> alamat = $request->alamat;
        $data_perusahaan -> provinsi = $request->provinsi;
        $data_perusahaan -> kabupaten = $request->kabupaten;
        $data_perusahaan -> kecamatan = $request->kecamatan;
        $data_perusahaan -> kelurahan = $request->kelurahan;
        $data_perusahaan -> telepon = $request->telepon;
        $data_perusahaan -> jenis_usaha = $request->jenis_usaha;
        $data_perusahaan -> nama_pemilik = $request->nama_pemilik;
        $data_perusahaan -> tanggal_pendirian = $request->tanggal_pendirian;
        $data_perusahaan -> no_akta = $request->no_akta;
        $data_perusahaan -> tanggal = $request->tanggal;
        $data_perusahaan -> klui = $request->klui;
        $data_perusahaan -> laki_laki_tki = $request->laki_laki_tki;
        $data_perusahaan -> laki_laki_tka = $request->laki_laki_tka;
        $data_perusahaan -> perempuan_tki = $request->perempuan_tki;
        $data_perusahaan -> perempuan_tka = $request->perempuan_tka;
        $data_perusahaan -> status_permodalan = $request->status_permodalan;
        $data_perusahaan -> jamsostek = $request->jamsostek;
        $data_perusahaan -> ph_industrial = $request->ph_industrial;
        $data_perusahaan -> penggunaan_alatbahan = $request->penggunaan_alatbahan;
        $data_perusahaan->save();

        return response()->json([
            'message' => 'data berhasil di tambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        data_perusahaan::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }

    public function excel(){
    $perusahaan = data_perusahaan::all();
    return view('excel.data_perusahaan', compact('perusahaan'));
    }

    public function export_excel(){
        $perusahaan = data_perusahaan::all();
        // status permoddalan
        $pmbn = data_perusahaan::where('status_permodalan', 1)->get();
        $pma = data_perusahaan::where('status_permodalan', 2)->get();
        $swasnas = data_perusahaan::where('status_permodalan', 3)->get();
        $join = data_perusahaan::where('status_permodalan', 4)->get();
        // jamsostel
        $jkk = data_perusahaan::where('jamsostek', 1)->get();
        $jk = data_perusahaan::where('jamsostek', 2)->get();
        $jht = data_perusahaan::where('jamsostek', 3)->get();
        $jpk = data_perusahaan::where('jamsostek', 4)->get();
        // ph industrial
        $pk = data_perusahaan::where('ph_industrial', 1)->get();
        $pp = data_perusahaan::where('ph_industrial', 2)->get();
        $pkb = data_perusahaan::where('ph_industrial', 3)->get();
        $bipartit = data_perusahaan::where('ph_industrial', 4)->get();
        $sptp = data_perusahaan::where('ph_industrial', 5)->get();
        $ukspsi = data_perusahaan::where('ph_industrial', 6)->get();
        $p2k3 = data_perusahaan::where('ph_industrial', 7)->get();
        $apindo = data_perusahaan::where('ph_industrial', 8)->get();

        //penggunaan alat dan bahan
        $pu = data_perusahaan::where('penggunaan_alatbahan', 1)->get();
        $pa = data_perusahaan::where('penggunaan_alatbahan', 2)->get();
        $pau = data_perusahaan::where('penggunaan_alatbahan', 3)->get();
        $aab = data_perusahaan::where('penggunaan_alatbahan', 4)->get();
        $md = data_perusahaan::where('penggunaan_alatbahan', 5)->get();
        $pp_1 = data_perusahaan::where('penggunaan_alatbahan', 6)->get();
        $ipk = data_perusahaan::where('penggunaan_alatbahan', 7)->get();
        $il = data_perusahaan::where('penggunaan_alatbahan', 8)->get();
        $pl = data_perusahaan::where('penggunaan_alatbahan', 9)->get();
        $lift = data_perusahaan::where('penggunaan_alatbahan', 10)->get();
        $bt = data_perusahaan::where('penggunaan_alatbahan', 11)->get();
        $bbb = data_perusahaan::where('penggunaan_alatbahan', 12)->get();
        $trb = data_perusahaan::where('penggunaan_alatbahan', 13)->get();
        $bb = data_perusahaan::where('penggunaan_alatbahan', 14)->get();
        
        // dd($status_permodalan);
        return view('excel.data_perusahaan', compact(
            'perusahaan','pu',
            'pmbn','pa',
            'pma','pau',
            'swasnas','aab',
            'join','md',
            'jkk','pp_1',
            'jk','ipk',
            'jht','il',
            'jpk','pl',
            'pk','lift',
            'pp','bt',
            'pkb','bbb',
            'bipartit', 'trb',
            'sptp', 'bb',
            'ukspsi',
            'p2k3',
            'apindo'
            ));
        // return Excel::download(new PerusahaanExport, 'Data_Perusahaan.xlsx');
        // $pdf = PDF::loadview('excel.data_perusahaan', compact('perusahaan', 'pmbn'))->setPaper('a4','landscape');
    	// return $pdf->stream('laporan-perusahaan-pdf.pdf');
    }
}
