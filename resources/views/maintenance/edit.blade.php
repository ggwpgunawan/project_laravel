@extends('layouts.master')

@section ('content')
<div class="col-12">
<form action="/maintenance/{{ $maintenance->id }}" method="POST">
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
              @if ($kategori_id == $maintenance->kategorilayanan_id)
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
              @if ($layanan_id == $maintenance->layanan_id)
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
              @if ($vendor_id == $maintenance->vendor_id)
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
                  @if ($unit_id == $maintenance->unit_id)
                  <option value="{{ $unit_id }}" selected>{{ $unit_name }}</option>   
                  @else
                  <option value="{{ $unit_id }}">{{ $unit_name }}</option>                      
                  @endif    
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="{{ $maintenance->deskripsi }}">
          </div>
      
     
      
        <div class="form-group col-md-4">
          <label>start_date </label>
          <input type="date" class="form-control" name="start_date" value="{{ $maintenance->start_date}}">
        </div>
      </div>
      
        <div class="form-row">
            <div class="form-group col-md-4">
              <label>end_date </label>
              <input type="date" class="form-control" name="end_date" value="{{ $maintenance->end_date }}">
            </div>

        <div class="form-group col-md-4">
          <label>Tahun Penilaian</label>
            <select name="tahun_id" class="form-control">
                <option value="">Please Select</option>
                @foreach ($tahun as $tahun_id => $tahun_name)
                  @if ($tahun_id == $maintenance->tahun_id)
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
                  @if ($semester_id == $maintenance->semester_id)
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
      <div class="form-group col-md-4">
        <label>Waktu Pengerjaan</label>
        <select name="waktu_pengerjaan" class="form-control star-rating">
          @foreach ($dropdown_rating as $rating)
            @if ($rating == $maintenance->waktu_pengerjaan)
            <option value="{{ $rating }}" selected>{{ $rating }}</option>   
            @else
            <option value="{{ $rating }}">{{ $rating }}</option>                      
            @endif  
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Kualitas Pekerjaan</label>
        <select name="kualitas_pekerjaan" class="form-control star-rating">
          @foreach ($dropdown_rating as $rating)
            @if ($rating == $maintenance->kualitas_pekerjaan)
            <option value="{{ $rating }}" selected>{{ $rating }}</option>   
            @else
            <option value="{{ $rating }}">{{ $rating }}</option>                      
            @endif  
          @endforeach
        </select>
      </div>
    
  
        <div class="form-group col-md-4">
          <label>Kemudahan koordinasi</label>
          <select name="kemudahan_koordinasi" class="form-control star-rating">
            @foreach ($dropdown_rating as $rating)
              @if ($rating == $maintenance->kemudahan_koordinasi)
              <option value="{{ $rating }}" selected>{{ $rating }}</option>   
              @else
              <option value="{{ $rating }}">{{ $rating }}</option>                      
              @endif  
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-4">
          <label>responsive</label>
          <select name="responsive" class="form-control star-rating">
            @foreach ($dropdown_rating as $rating)
              @if ($rating == $maintenance->responsive)
              <option value="{{ $rating }}" selected>{{ $rating }}</option>   
              @else
              <option value="{{ $rating }}">{{ $rating }}</option>                      
              @endif  
            @endforeach
          </select>
        </div>
      </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="/maintenance" class="btn btn-secondary">Back</a>

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