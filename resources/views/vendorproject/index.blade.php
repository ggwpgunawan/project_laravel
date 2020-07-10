@extends('layouts.master')

@section ('content')
@if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>
@endif
<div class="col-12">
<div class="mb-4">
    <a href="/vendorproject/create" class="btn btn-primary">Create</a>
</div>
    

<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
      <tr>
        <th>Unit</th>
        <th>kategori layanan</th>
        <th>layanan</th>
        <th>vendor</th>
        <th>tgl bast</th>
        <th>total rating</th>
        <th>aksi</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($vendorproject as $item)
                    <td>{{ $item->unit->code }}</td>
                    <td>{{ $item->kategorilayanan->kategori }}</td>
                    <td>{{ $item->layanan->nama_layanan }}</td>
                    <td>{{ $item->vendor->nama_vendor }}</td>
                    <td>{{ $item->tgl_bast }}</td>
                    <td>{{ $item->total_rating }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
                          data-role="display-detail"
                            data-pengirimanmaterial="{{ $item->pengiriman_material }}"
                            data-waktupengerjaan="{{ $item->waktu_pengerjaan }}"
                            data-kualitaspengerjaan="{{ $item->kualitas_pengerjaan }}"
                            data-kemudahankoordinasi="{{ $item->kemudahan_koordinasi }}"
                            data-responsive="{{ $item->responsive }}"
                           
                            
                            {{-- nilai yg ingin ditampilkan di modal simpan disini --}}
                            >
                            Detail
                        </button>

                        <a class="btn btn-success btn-sm" href="/vendorproject/{{ $item->id }}/edit">Edit</a>

                        <form method="POST" action="/vendorproject/{{ $item->id }}" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                                Delete
                    </td>
                            </button>
                        </form>    
                </tr>
            @endforeach
  </tbody>
</table>     

</div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          pengiriman :
          <select id="nilai-pengiriman" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <br>
          waktu :
          <select id="nilai-waktupengerjaan" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select> <br>
          kualitas :
          <select id="nilai-kualitaspengerjaan" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select><br>
          kemudahan  :
          <select id="nilai-kemudahankoordinasi" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select><br>
          responsive :
          <select id="nilai-responsive" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/jquery-bar-rating') }}/dist/themes/fontawesome-5-stars.css">
@endpush

@push('js')
    <script src="{{ asset('plugins/jquery-bar-rating') }}/dist/jquery.barrating.min.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.star-rating').barrating({
            theme: 'fontawesome-stars',
            readonly: true,
        });
    });
    </script>
@endpush

@push('js')
<script>
    $('[data-role="display-detail"]').on('click', function(){
        var pengiriman = $(this).attr('data-pengirimanmaterial')
        var waktu = $(this).attr('data-waktupengerjaan')
        var kualitas = $(this).attr('data-kualitaspengerjaan')
        var kemudahan = $(this).attr('data-kemudahankoordinasi')
        var responsive = $(this).attr('data-responsive')

        $('#nilai-pengiriman').barrating('set',pengiriman);
        $('#nilai-waktupengerjaan').barrating('set',waktu);
        $('#nilai-kualitaspengerjaan').barrating('set',kualitas);
        $('#nilai-kemudahankoordinasi').barrating('set',kemudahan ); 
        $('#nilai-responsive').barrating('set',responsive);         
    })
</script>
@endpush