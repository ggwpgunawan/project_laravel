@extends('layouts.master')

@section ('content')
<div class="col-12">
<form action="/produkperform/{{ $produkperform->id }}" method="POST">
    @method('PUT')
    {{-- untuk edit biasanya pakai method put --}}
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Kategori Produk</label>
        <select name="kategoriproduk_id" class="form-control">
            {{-- beda nya create dan edit --}}
            {{-- klo edit ada nilai nya --}}
            <option value="">Please Select</option>
            @foreach ($kategori as $kategori_id => $kategori_name)
              @if ($kategori_id == $produkperform->kategoriproduk_id)
              <option value="{{ $kategori_id }}" selected>{{ $kategori_name }}</option>   
              @else
              <option value="{{ $kategori_id }}">{{ $kategori_name }}</option>                      
              @endif            
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Nama Produk</label>
        <select name="produk_id" class="form-control">
            <option value="">Please Select</option>
            @foreach ($produk as $produk_id => $produk_name)   
              @if ($produk_id == $produkperform->produk_id)
              <option value="{{ $produk_id }}" selected>{{ $produk_name }}</option>   
              @else
              <option value="{{ $produk_id }}">{{ $produk_name }}</option>                      
              @endif
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Vendor Produk</label>
        <select name="vendor_id" class="form-control">
            <option value="">Please Select</option>
            @foreach ($vendor as $vendor_id => $vendor_name)
              @if ($vendor_id == $produkperform->vendor_id)
              <option value="{{ $vendor_id }}" selected>{{ $vendor_name }}</option>   
              @else
              <option value="{{ $vendor_id }}">{{ $vendor_name }}</option>                      
              @endif   
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
                  @if ($unit_id == $produkperform->unit_id)
                  <option value="{{ $unit_id }}" selected>{{ $unit_name }}</option>   
                  @else
                  <option value="{{ $unit_id }}">{{ $unit_name }}</option>                      
                  @endif    
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="{{ $produkperform->deskripsi }}">
          </div>
      </div>
     
      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Tahun Pembelian</label>
          <input type="date" class="form-control" name="pembelian" value="{{ $produkperform->pembelian }}">
        </div>
      
        <div class="form-group col-md-4">
          <label>Tahun Penilaian</label>
            <select name="tahun_id" class="form-control">
                <option value="">Please Select</option>
                @foreach ($tahun as $tahun_id => $tahun_name)
                  @if ($tahun_id == $produkperform->tahun_id)
                  <option value="{{ $tahun_id }}" selected>{{ $tahun_name }}</option>   
                  @else
                  <option value="{{ $tahun_id }}">{{ $tahun_name }}</option>                      
                  @endif    
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
          <label>Semester Penilaian</label>
            <select name="semester_id" class="form-control">
                <option value="">Please Select</option>
                @foreach ($semester as $semester_id => $semester_name)
                  @if ($semester_id == $produkperform->semester_id)
                  <option value="{{ $semester_id }}" selected>{{ $semester_name }}</option>   
                  @else
                  <option value="{{ $semester_id }}">{{ $semester_name }}</option>                      
                  @endif  
                @endforeach
            </select>
        </div>
      </div>

@php
    $dropdown_rating = [
      1,2,3,4,5
    ]
@endphp

    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Kualitas Barang</label>
        <select name="kualitas" class="form-control star-rating">
          @foreach ($dropdown_rating as $rating)
            @if ($rating == $produkperform->kualitas)
            <option value="{{ $rating }}" selected>{{ $rating }}</option>   
            @else
            <option value="{{ $rating }}">{{ $rating }}</option>                      
            @endif  
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Kemudahan Support</label>
        <select name="support" class="form-control star-rating">
          @foreach ($dropdown_rating as $rating)
            @if ($rating == $produkperform->support)
            <option value="{{ $rating }}" selected>{{ $rating }}</option>   
            @else
            <option value="{{ $rating }}">{{ $rating }}</option>                      
            @endif  
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Kemudahan Pengadaan</label>
        <select name="pengadaan" class="form-control star-rating">
          @foreach ($dropdown_rating as $rating)
            @if ($rating == $produkperform->pengadaan)
            <option value="{{ $rating }}" selected>{{ $rating }}</option>   
            @else
            <option value="{{ $rating }}">{{ $rating }}</option>                      
            @endif  
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Harga Sparepart</label>
        <select name="sukucadang" class="form-control star-rating">
          @foreach ($dropdown_rating as $rating)
            @if ($rating == $produkperform->sukucadang)
            <option value="{{ $rating }}" selected>{{ $rating }}</option>   
            @else
            <option value="{{ $rating }}">{{ $rating }}</option>                      
            @endif  
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
          <label>Kelengkapan Feature</label>
          <select name="fitur" class="form-control star-rating">
            @foreach ($dropdown_rating as $rating)
              @if ($rating == $produkperform->fitur)
              <option value="{{ $rating }}" selected>{{ $rating }}</option>   
              @else
              <option value="{{ $rating }}">{{ $rating }}</option>                      
              @endif  
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>Performance</label>
          <select name="performance" class="form-control star-rating">
            @foreach ($dropdown_rating as $rating)
              @if ($rating == $produkperform->performance)
              <option value="{{ $rating }}" selected>{{ $rating }}</option>   
              @else
              <option value="{{ $rating }}">{{ $rating }}</option>                      
              @endif  
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>Kemudahan Penggunaan</label>
          <select name="penggunaan" class="form-control star-rating">
            @foreach ($dropdown_rating as $rating)
              @if ($rating == $produkperform->penggunaan)
              <option value="{{ $rating }}" selected>{{ $rating }}</option>   
              @else
              <option value="{{ $rating }}">{{ $rating }}</option>                      
              @endif  
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>Garansi</label>
          <select name="garansi" class="form-control star-rating">
            @foreach ($dropdown_rating as $rating)
              @if ($rating == $produkperform->garansi)
              <option value="{{ $rating }}" selected>{{ $rating }}</option>   
              @else
              <option value="{{ $rating }}">{{ $rating }}</option>                      
              @endif  
            @endforeach
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