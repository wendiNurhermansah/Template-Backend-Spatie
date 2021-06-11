@extends('layouts.main')
@section('title', 'Daftar Data Perusahaan')



@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>                       
                        <i class="icon icon-users mr-2"></i>
                        List Perusahaan                   
                    </h4>
                </div>
            </div>
            
                <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li class="nav-item">
                            <a class="nav-link active show" id="tab1" data-toggle="tab" href="#semua-data" role="tab"><i class="icon icon-home2"></i>Semua Data Perusahaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2" data-toggle="tab" href="#tambah-data" role="tab"><i class="icon icon-plus"></i>Tambah Data Perusahaan</a>
                        </li>
                    </ul>
                </div>
            
        </div>
    </header>
        <div class="container-fluid relative animatedParent animateOnce">
            <div class="container-fluid relative animatedParent animateOnce">
                <div class="tab-content my-3" id="pills-tabContent">
                    <div class="tab-pane animated fadeInUpShort show active"  id="semua-data" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{session('status')}}
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">

                                                
                                                <thead>
                                                    <th width="30">NO</th>
                                                    <th>NAMA PERUSAHAAN</th>
                                                    <th>ALAMAT PERUSAHAAN</th>
                                                    <th>JENIS USAHA</th>
                                                    <th>KLUI</th>
                                                    
                                                    <th width="60">TINDAKAN</th>
                                                </thead>
                                                

                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane animated fadeInUpShort" id="tambah-data" role="tabpanel">
                    <div id="alert"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card my-3">
                                    <div class="card-body b-b bg-light">
                                    <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                    {{ method_field('POST') }}
                                    <input type="hidden" id="id" name="id"/>
                                    <h4 id="formTitle">Tambah Data</h4><hr>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label for="nama_perusahaan" class="col-form-label s-12 col-md-3">Nama Perusahaan</label>
                                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>                          
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nama_perusahaan" class="col-form-label s-12 col-md-1">TKI:</label>   
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label for="alamat" class="col-form-label s-12 col-md-3">Alamat</label>
                                            <input type="text" name="alamat" id="alamat" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                        
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="laki_laki_tki" class="col-form-label s-12 col-md-3">Laki-Laki</label>
                                            <input type="text" name="laki_laki_tki" id="laki_laki_tki" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label s-12 col-md-3">Provinsi</label>
                                            <div class="col-md-6 p-0 bg-light">
                                                <select class="select2 form-control r-0 light s-12" name="provinsi" id="provinsi" autocomplete="off">
                                                    <option value="">Pilih</option>
                                                    @foreach ($provinsi as $i)
                                                        <option value="{{ $i->id }}">{{ $i->n_provinsi }}</option>
                                                     @endforeach
                                                        
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="perempuan_tki" class="col-form-label s-12 col-md-3">Perempuan</label>
                                            <input type="text" name="perempuan_tki" id="perempuan_tki" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label s-12 col-md-3">Kabupaten</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="kabupaten" id="kabupaten" autocomplete="off">
                                                        
                                                        
                                                    </select>
                                                </div> 
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="perempuan_tki" class="col-form-label s-12 col-md-1">TKA:</label>
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                        <label class="col-form-label s-12 col-md-3">Kecamatan</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="kecamatan" id="kecamatan" autocomplete="off">
                                                        
                                                        
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="laki_laki_tka" class="col-form-label s-12 col-md-3">Laki-Laki</label>
                                            <input type="text" name="laki_laki_tka" id="laki_laki_tka" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                        <label class="col-form-label s-12 col-md-3">Kelurahan</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="kelurahan" id="kelurahan" autocomplete="off">
                                                        
                                                        
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="perempuan_tka" class="col-form-label s-12 col-md-3">Perempuan</label>
                                            <input type="text" name="perempuan_tka" id="perempuan_tka" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label for="telepon" class="col-form-label s-12 col-md-3">Telepon</label>
                                            <input type="text" name="telepon" id="telepon" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            
                                        
                                            <label for="nama_perusahaan" class="col-form-label s-12 col-md-3">Status Permodalan</label>
                                            <input type="radio" name="status_permodalan" id="pmdn" class=" r-0 light s-12 " autocomplete="off" value="1"/>
                                            <label for="pmdn" class="col-form-label s-12">PMDN</label>
                                            <input type="radio" name="status_permodalan" id="pma" class=" r-0 light s-12 ml-3" autocomplete="off" value="2"/>
                                            <label for="pma" class="col-form-label s-12">PMA</label>
                                            <input type="radio" name="status_permodalan" id="swasnas" class=" r-0 light s-12 ml-3" autocomplete="off" value="3"/>
                                            <label for="swasnas" class="col-form-label s-12">SWASNAS</label>

                                            <input type="radio" name="status_permodalan" id="join" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="4"/>
                                            <label for="join" class="col-form-label s-12">JOIN</label>
                                            
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label for="jenis_usaha" class="col-form-label s-12 col-md-3">Jenis Usaha</label>
                                            <input type="text" name="jenis_usaha" id="jenis_usaha" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            
                                        </div>
                                        <div class="form-group col-md-6 m-20">
                                            <label for="nama_perusahaan" class="col-form-label s-12 col-md-3">Jamsostek</label>
                                            <input type="radio" name="jamsostek" id="jkk" class="form-control r-0 light s-12 " autocomplete="off" value="1" />
                                            <label for="jkk" class="col-form-label s-12">JKK</label>
                                            <input type="radio" name="jamsostek" id="jk" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="2"/>
                                            <label for="jk" class="col-form-label s-12">JK</label>
                                            <input type="radio" name="jamsostek" id="jht" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="3"/>
                                            <label for="jht" class="col-form-label s-12">JHT</label>
                                            <input type="radio" name="jamsostek" id="jpk" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="4"/>
                                            <label for="jpk" class="col-form-label s-12">JPK</label>
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label for="nama_pemilik" class="col-form-label s-12 col-md-3">Nama Pemilik / Pengurus</label>
                                            <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nama_perusahaan" class="col-form-label s-12 col-md-3">Penggunaan Alat Dan Bahan</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="pu" class="form-control r-0 light s-12 " autocomplete="off" value="1"/>
                                            <label for="pu" class="col-form-label s-12">PU</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="pa" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="2"/>
                                            <label for="pa" class="col-form-label s-12">PA</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="pau" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="3"/>
                                            <label for="pau" class="col-form-label s-12">PAU</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="aab" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="4"/>
                                            <label for="aab" class="col-form-label s-12">AAB</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="mb" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="5"/>
                                            <label for="mb" class="col-form-label s-12">MB</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="pp" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="6"/>
                                            <label for="pp" class="col-form-label s-12">PP</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="ipk" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="7"/>
                                            <label for="ipk" class="col-form-label s-12">IPK</label>
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label for="tanggal_pendirian" class="col-form-label s-12 col-md-3">Tanggal Pendirian</label>
                                            <input type="date" name="tanggal_pendirian" id="tanggal_pendirian" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nama_perusahaan" class="col-form-label s-12 col-md-3"></label>
                                            <input type="radio" name="penggunaan_alatbahan" id="il" class="form-control r-0 light s-12 " autocomplete="off" value="8" />
                                            <label for="il" class="col-form-label s-12">IL</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="pl" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="9"  />
                                            <label for="pl" class="col-form-label s-12">PL</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="lift" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="10"  />
                                            <label for="lift" class="col-form-label s-12">LIFT</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="bt" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="11" />
                                            <label for="bt" class="col-form-label s-12">BT</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="bbb" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="12" />
                                            <label for="bbb" class="col-form-label s-12">BBB</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="trb" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="13"  />
                                            <label for="trb" class="col-form-label s-12">TRB</label>
                                            <input type="radio" name="penggunaan_alatbahan" id="bb" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="14" />
                                            <label for="bb" class="col-form-label s-12">BB</label>
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label for="no_akta" class="col-form-label s-12 col-md-3">No Akte Pendirian</label>
                                            <input type="text" name="no_akta" id="no_akta" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nama_perusahaan" class="col-form-label s-12 col-md-3">Perangkat Hub Industrial</label>
                                            <input type="radio" name="ph_industrial" id="pk" class="form-control r-0 light s-12 " autocomplete="off" value="1" />
                                            <label for="pk" class="col-form-label s-12">Pk</label>
                                            <input type="radio" name="ph_industrial" id="pp_1" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="2" />
                                            <label for="pp_1" class="col-form-label s-12">PP</label>
                                            <input type="radio" name="ph_industrial" id="pkb" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="3" />
                                            <label for="pkb" class="col-form-label s-12">PKB</label>
                                            <input type="radio" name="ph_industrial" id="bipartit" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="4" />
                                            <label for="bipartit" class="col-form-label s-12">BIPARTIT</label>
                                            
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label for="tanggal" class="col-form-label s-12 col-md-3">Tanggal</label>
                                            <input type="date" name="tanggal" id="tanggal" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nama_perusahaan" class="col-form-label s-12 col-md-3"></label>
                                            <input type="radio" name="ph_industrial" id="stpt" class="form-control r-0 light s-12 " autocomplete="off" value="5" cheked />
                                            <label for="stpt" class="col-form-label s-12">STPT</label>
                                            <input type="radio" name="ph_industrial" id="uk_spsi" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="6" cheked/>
                                            <label for="uk_spsi" class="col-form-label s-12">UK SPSI</label>
                                            <input type="radio" name="ph_industrial" id="p2k3" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="7" cheked/>
                                            <label for="p2k3" class="col-form-label s-12">P2K3</label>
                                            <input type="radio" name="ph_industrial" id="apindo" class="form-control r-0 light s-12 ml-3" autocomplete="off" value="8"/>
                                            <label for="apindo" class="col-form-label s-12">APINDO</label>
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-6">
                                            <label for="klui" class="col-form-label s-12 col-md-3">KLUI</label>
                                            <input type="text" name="klui" id="klui" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            
                                        </div>
                                    </div>
                                    
                                            <div class="mt-4" style="margin-left: 40%">
                                                <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-save mr-2"></i>Simpan<span id="txtAction"></span></button>
                                                <a class="btn btn-sm" onclick="add()" id="reset">Reset</a>
                                            </div>
                                        
                                    
                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@section('script')
 <script type="text/javascript">
    var table = $('#dataTable').dataTable({
        processing: true,
        serverSide: true,
        order: [ 0, 'asc' ],
        ajax: {
            url: "{{ route('Perusahaan.data_perusahaan.api') }}",
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'nama_perusahaan', name: 'nama_perusahaan'},
            {data: 'alamat', name: 'alamat'},
            {data: 'jenis_usaha', name: 'jenis_usaha'},
            {data: 'klui', name: 'klui'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]
    });

    $('#provinsi').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kabupaten').html(option);
            $('#kecamatan').html(option);
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kabupaten').html("<option value=''>Loading...</option>");
            url = "{{ route('Perusahaan.kabupatenByProvinsi', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kabupaten +"</li>";
                    });
                    $('#kabupaten').empty().html(option);

                    $("#kabupaten").val($("#kabupaten option:first").val()).trigger("change.select2");
                }else{
                    $('#kabupaten').html(option);
                    $('#kecamatan').html(option);
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    $('#kabupaten').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kecamatan').html(option);
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kecamatan').html("<option value=''>Loading...</option>");
            url = "{{ route('Perusahaan.kecamatanByKabupaten', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kecamatan +"</li>";
                    });
                    $('#kecamatan').empty().html(option);

                    $("#kecamatan").val($("#kecamatan option:first").val()).trigger("change.select2");
                }else{
                    $('#kecamatan').html(option);
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    $('#kecamatan').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kelurahan').html("<option value=''>Loading...</option>");
            url = "{{ route('Perusahaan.kelurahanByKecamatan', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kelurahan +"</li>";
                    });
                    $('#kelurahan').empty().html(option);

                    $("#kelurahan").val($("#kelurahan option:first").val()).trigger("change.select2");
                }else{
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#provinsi').trigger('reset');
        $('#kabupaten').trigger('reset');
        $('#kecamatan').trigger('reset');
        $('#kelurahan').trigger('reset');
        $('#formTitle').html('Tambah Data');
        $('input[name=_method]').val('POST');
        $('#txtAction').html('');
        $('#reset').show();
        $('#name').focus();
        $('#result').attr({
            'src': '-',
            'alt': ''
         });
         $('#changeText').html('Browse Image');
         $('#preview').attr({
        'src': '-',
        'alt': ''
        });
    }

    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            url = "{{ route('Perusahaan.data_perusahaan.store') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    table.api().ajax.reload();
                    // location.realod();
                    add();
                },
                error : function(data){
                    err = '';
                    respon = data.responseJSON;
                    if(respon.errors){
                        $.each(respon.errors, function( index, value ) {
                            err = err + "<li>" + value +"</li>";
                        });
                    }
                    $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                }
            });
            return false;
        }
        $(this).addClass('was-validated');
    });

    function remove(id){
        $.confirm({
            title: '',
            content: 'Apakah Anda yakin akan menghapus data ini ?',
            icon: 'icon icon-question amber-text',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'red',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                        $.post("{{ route('Perusahaan.data_perusahaan.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           table.api().ajax.reload();
                            if(id == $('#id').val()) add();
                        }, "JSON").fail(function(){
                            location.reload();
                        });
                    }
                },
                cancel: function(){}
            }
        });
    }


    </script>

@endsection