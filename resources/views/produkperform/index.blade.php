@extends('layouts.master')

@section ('content')
@if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>
@endif

<div class="col-12">
<div class="mb-4">
    <a href="/produkperform/create" class="btn btn-primary">Create</a>
</div>
    

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Unit</th>
                <th>kategori produk</th>
                <th>produk</th>
                <th>vendor</th>
                <th>pembelian</th>
                <th>total rating</th>
                <th>aksi</th>
{{-- 
    
                ntar detailnya di klik detail gtu mas
                gmana?
                bisa bisa
                ini aja yg ditabel ?
                iya ini dlu gpp 
                nti q tmbhin kurangnya
                
                klo yg mau ditampilkan di klikapaaja?
                coba tulis 2 nanti ditambahkna sisanya
                2 aja dulu


                //detail ratingnya tadi mas
                tadi mana yaa 
                kualiatas
                support
                pengadaan 

                ok nanti sisanya tambahkan
             --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($produkperform as $item)
                 <td>{{ $item->unit->code }}</td>
                    <td>{{ $item->kategoriproduk->kategori }}</td>
                    <td>{{ $item->produk->nama_produk }}</td>
                    <td>{{ $item->vendor->nama_vendor }}</td>
                    <td>{{ $item->pembelian }}</td>
                    <td>{{ $item->total_rating }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
                            data-role="display-detail"
                            data-kualitas="{{ $item->kualitas }}"
                            data-support="{{ $item->support }}"
                            data-pengadaan="{{ $item->pengadaan }}"
                            data-sukucadang= "{{ $item->sukucadang }}"
                            data-performance= "{{ $item->sukucadang }}"
                            data-fitur= "{{ $item->sukucadang }}"
                            data-penggunaan= "{{ $item->sukucadang }}"
                            data-garansi= "{{ $item->sukucadang }}"
                            {{-- nanti nilai yg ingin ditampilkan di modal simpan disini --}}
                            >
                            Detail
                        </button>

                        <a class="btn btn-success btn-sm" href="/produkperform/{{ $item->id }}/edit">Edit</a>

                        <form method="POST" action="/produkperform/{{ $item->id }}" style="display: inline-block">
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
</div>
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
          Kualitas :
          <select id="nilai-kualitas" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <br>
          Support :
          <select id="nilai-support" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select> 
          <br>
          Pengadaan :
          <select id="nilai-pengadaan" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <br>
        
        Suku cadang :
          <select id="nilai-sukucadang" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <br>
        
        Performance :
          <select id="nilai-performance" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <br>
        
        Fitur :
          <select id="nilai-fitur" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <br>
        
        Penggunaan :
          <select id="nilai-penggunaan" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <br>
        
        Garansi :
          <select id="nilai-garansi" class="form-control star-rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <br>
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
        var kualitas = $(this).attr('data-kualitas')
        var support = $(this).attr('data-support')
        var pengadaan = $(this).attr('data-pengadaan')
        var sukucadang = $(this).attr('data-sukucadang')
        var performance = $(this).attr('data-performance')
        var fitur = $(this).attr('data-fitur')
        var penggunaan = $(this).attr('data-penggunaan')
        var garansi = $(this).attr('data-garansi')


        $('#nilai-kualitas').barrating('set', kualitas);
        $('#nilai-support').barrating('set', support);
        $('#nilai-pengadaan').barrating('set', pengadaan);    
        $('#nilai-sukucadang').barrating('set', sukucadang);
        $('#nilai-performance').barrating('set', performance);
        $('#nilai-fitur').barrating('set', fitur);
        $('#nilai-penggunaan').barrating('set', penggunaan);
        $('#nilai-garansi').barrating('set', garansi);    
    })
</script>
@endpush