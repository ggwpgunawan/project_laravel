@extends('layouts.master')

@section ('content')
<div class="col-12">
<form action="/vendorproject" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Kategori layanan</label>
        <select id="kategorilayanan" name="kategorilayanan_id" class="form-control js-example-basic-single">
            <option value="0" disable="true" selected="true">Please Select</option>
            @foreach ($kategori as $key => $value)
            <option value="{{ $value->id }}">{{ $value->kategori }}</option>    
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Nama layanan</label>
        <select id="layanan" name="layanan_id" class="form-control js-example-basic-single">
            <option value="0" disable="true" selected="true">Please Select</option>
            {{--@foreach ($layanan as $arr => $item)
            <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>    
            @endforeach--}}
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Vendor </label>
        <select name="vendor_id" class="form-control js-example-basic-single">
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
            <select name="unit_id" class="form-control js-example-basic-single">
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
          <label>Pilih Gambar</label>
          <input type="file" class="form-control" name="image">
          <p class="text-danger">{{ $errors->first('image') }}</p>
         {{-- <input type="file" name="image" class="form-control">--}}
        </div>
      </div>
     
      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Tgl Bast</label>
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
        <label>pengiriman material</label>
        <select name="pengiriman_material" class="form-control star-rating">
          <option value=""></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>waktu pengerjaan</label>
        <select name="waktu_pengerjaan" class="form-control star-rating">
          <option value=""></option>  
          <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>kualitas pengerjaan</label>
        <select name="kualitas_pengerjaan" class="form-control star-rating">
          <option value=""></option> 
          <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>kemudahan koordinasi</label>
        <select name="kemudahan_koordinasi" class="form-control star-rating">
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
          <label>responsive</label>
          <select name="responsive" class="form-control star-rating">
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

    
      $('#kategorilayanan').on('change', function(e){
        console.log(e);
        var kategorilayanan_id = e.target.value;
        $.get('/json-layanan?kategorilayanan_id=' + kategorilayanan_id,function(data) {
          console.log(data);
          $('#layanan').empty();
          $('#layanan').append('<option value="0" disable="true" selected="true"> Please Select </option>');


          $.each(data, function(index, layananObj){
            $('#layanan').append('<option value="'+ layananObj.id +'">'+ layananObj.name +'</option>');
          })
        });
      });

    </script>
@endpush

