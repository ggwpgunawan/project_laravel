@extends('layouts.master')

@section ('content')
<div class="col-12">
<form action="/produkperform" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Kategori Produk</label>
        <select name="kategoriproduk_id" class="form-control">
            <option value="">Please Select</option>
            @foreach ($kategori as $kategori_id => $kategori_name)
            <option value="{{ $kategori_id }}">{{ $kategori_name }}</option>    
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Nama Produk</label>
        <select name="produk_id" class="form-control">
            <option value="">Please Select</option>
            @foreach ($produk as $produk_id => $produk_name)
            <option value="{{ $produk_id }}">{{ $produk_name }}</option>    
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Vendor Produk</label>
        <select name="vendor_id" class="form-control">
            <option value="">Please Select</option>
            @foreach ($vendor as $vendor_id => $vendor_name)
            <option value="{{ $vendor_id }}">{{ $vendor_name }}</option>    
            @endforeach
        </select>
      </div>
    </div>
    <div class="form-row">
        {{--
        <div class="form-group col-md-4">
          <label>Brand</label>
          <input type="text" class="form-control" name="brand">
        </div>
        <div class="form-group col-md-4">
          <label>Type</label>
          <input type="text" class="form-control" name="type">
        </div>
        --}}
        <div class="form-group col-md-4">
          <label>Organization</label>
            <select name="unit_id" class="form-control">
                <option value="">Please Select</option>
                @foreach ($unit as $unit_id => $unit_name)
                <option value="{{ $unit_id }}">{{ $unit_name }}</option>    
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi">
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
          <<label>Pilih Gambar</label>
          <input type="file" class="form-control" name="image">
          <p class="text-danger">{{ $errors->first('image') }}</p>
         {{-- <input type="file" name="image" class="form-control">--}}
        </div>
      </div>
     
      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Tahun Pembelian</label>
          <input type="date" class="form-control" name="pembelian">
        </div>
      
        <div class="form-group col-md-4">
          <label>Tahun Penilaian</label>
            <select name="tahun_id" class="form-control">
                <option value="">Please Select</option>
                @foreach ($tahun as $tahun_id => $tahun_name)
                <option value="{{ $tahun_id }}">{{ $tahun_name }}</option>    
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
          <label>Semester Penilaian</label>
            <select name="semester_id" class="form-control">
                <option value="">Please Select</option>
                @foreach ($semester as $semester_id => $semester_name)
                <option value="{{ $semester_id }}">{{ $semester_name }}</option>    
                @endforeach
            </select>
        </div>
      </div>
    
      

    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Kualitas Barang</label>
        <select name="kualitas" class="form-control star-rating">
          <option value=""></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Kemudahan Support</label>
        <select name="support" class="form-control star-rating">
          <option value=""></option>
          <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Kemudahan Pengadaan</label>
        <select name="pengadaan" class="form-control star-rating">
          <option value=""></option> 
          <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Harga Sparepart</label>
        <select name="sukucadang" class="form-control star-rating">
          <option value=""></option>
          <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
          <label>Kelengkapan Feature</label>
          <select name="fitur" class="form-control star-rating">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>Performance</label>
          <select name="performance" class="form-control star-rating">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>Kemudahan Penggunaan</label>
          <select name="penggunaan" class="form-control star-rating">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>Garansi</label>
          <select name="garansi" class="form-control star-rating">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
      </div>

  
    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="/produkperform" class="btn btn-secondary">Back</a>

</form>
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
            theme: 'fontawesome-stars'
        });
    });
    </script>
@endpush