@extends('layouts.master')

@section ('content')
<div class="col-12">
<form action="/vendorproject/{{ $vendorproject->id }}" method="POST">
    @method('PUT')
    {{-- untuk edit biasanya pakai method put --}}
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Kategori Layanan</label>
        <select name="kategorilayanan_id" class="form-control js-example-basic-single">
            {{-- beda nya create dan edit --}}
            {{-- klo edit ada nilai nya --}}
            <option value="">Please Select</option>
            @foreach ($kategori as $kategori_id => $kategori_name)
              @if ($kategori_id == $vendorproject->kategorilayanan_id)
              <option value="{{ $kategori_id }}" selected>{{ $kategori_name }}</option>   
              @else
              <option value="{{ $kategori_id }}">{{ $kategori_name }}</option>                      
              @endif            
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Nama Layanan</label>
        <select name="layanan_id" class="form-control js-example-basic-single">
            <option value="">Please Select</option>
            @foreach ($layanan as $layanan_id => $layanan_name)   
              @if ($layanan_id == $vendorproject->layanan_id)
              <option value="{{ $layanan_id }}" selected>{{ $layanan_name }}</option>   
              @else
              <option value="{{ $layanan_id }}">{{ $layanan_name }}</option>                      
              @endif
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Vendor Produk</label>
        <select name="vendor_id" class="form-control js-example-basic-single">
            <option value="">Please Select</option>
            @foreach ($vendor as $vendor_id => $vendor_name)
              @if ($vendor_id == $vendorproject->vendor_id)
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
            <select name="unit_id" class="form-control js-example-basic-single">
                <option value="">Please Select</option>
                @foreach ($unit as $unit_id => $unit_name)
                  @if ($unit_id == $vendorproject->unit_id)
                  <option value="{{ $unit_id }}" selected>{{ $unit_name }}</option>   
                  @else
                  <option value="{{ $unit_id }}">{{ $unit_name }}</option>                      
                  @endif    
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="{{ $vendorproject->deskripsi }}">
          </div>
      </div>
     
      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Tgl Bast </label>
          <input type="date" class="form-control" name="tgl_bast" value="{{ $vendorproject->tgl_bast }}">
        </div>
      
        <div class="form-group col-md-4">
          <label>Tahun Penilaian</label>
            <select name="tahun_id" class="form-control">
                <option value="">Please Select</option>
                @foreach ($tahun as $tahun_id => $tahun_name)
                  @if ($tahun_id == $vendorproject->tahun_id)
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
                  @if ($semester_id == $vendorproject->semester_id)
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
        <label>Pengiriman material</label>
        <select name="pengiriman_material" class="form-control star-rating">
          @foreach ($dropdown_rating as $rating)
            @if ($rating == $vendorproject->pengiriman_material)
            <option value="{{ $rating }}" selected>{{ $rating }}</option>   
            @else
            <option value="{{ $rating }}">{{ $rating }}</option>                      
            @endif  
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Waktu Pengerjaan</label>
        <select name="waktu_pengerjaan" class="form-control star-rating">
          @foreach ($dropdown_rating as $rating)
            @if ($rating == $vendorproject->waktu_pengerjaan)
            <option value="{{ $rating }}" selected>{{ $rating }}</option>   
            @else
            <option value="{{ $rating }}">{{ $rating }}</option>                      
            @endif  
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Kualitas Pengerjaan</label>
        <select name="kualitas_pengerjaan" class="form-control star-rating">
          @foreach ($dropdown_rating as $rating)
            @if ($rating == $vendorproject->kualitas_pengerjaan)
            <option value="{{ $rating }}" selected>{{ $rating }}</option>   
            @else
            <option value="{{ $rating }}">{{ $rating }}</option>                      
            @endif  
          @endforeach
        </select>
      </div>
    </div>
    
        <div class="form-group col-md-3">
          <label>Kemudahan koordinasi</label>
          <select name="kemudahan_koordinasi" class="form-control star-rating">
            @foreach ($dropdown_rating as $rating)
              @if ($rating == $vendorproject->kemudahan_koordinasi)
              <option value="{{ $rating }}" selected>{{ $rating }}</option>   
              @else
              <option value="{{ $rating }}">{{ $rating }}</option>                      
              @endif  
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>responsive</label>
          <select name="responsive" class="form-control star-rating">
            @foreach ($dropdown_rating as $rating)
              @if ($rating == $vendorproject->responsive)
              <option value="{{ $rating }}" selected>{{ $rating }}</option>   
              @else
              <option value="{{ $rating }}">{{ $rating }}</option>                      
              @endif  
            @endforeach
          </select>
        </div>
      </div>
        
 
    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="/vendorproject" class="btn btn-secondary">Back</a>

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