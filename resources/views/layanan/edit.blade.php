@extends('layouts.master')
@section ('content')

<h1> Edit Data layanan</h1>
                @if (session('sukses'))
                <div class="alert alert-success" role="alert">
                Data Berhasil Diinput!
                </div>
                @endif
                
<div class="main">
       <div class="main-content">
           <div class="container-fluid">
                 <div class="row">
                      <div class="col-md-12">
                               <div class="panel">
								<div class="panel-body">
							    <form action ="/layanan/{{$layanan->id}}/update" method = "POST">
                                {{csrf_field()}}

                                <div class="form-group">
                                <label for="exampleInputEmail1">nama layanan</label>
                                <input name = nama_layanan type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama_layanan" value="{{$layanan->nama_layanan}}">   
                            </div>
                            
                            <div class="form-group">
                            <label for="exampleInputEmail1">kategori</label>
                                <select name = "kategorilayanan_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kategorilayanan_id" >   
                                @foreach($kategori as $kategoriId => $kategoriLabel)
                                  <option value="{{$kategoriId}}">{{$kategoriLabel}}> </option>
                                  @endforeach
                                  </select>
                            </div>   

                            <div class="form-group">
                            <label for="exampleInputEmail1">deskripsi</label>
                                <input name = deskripsi type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="deskripsi" value="{{$layanan->deskripsi}}">   
                            </div>  
                             
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>  
                            </form>
                        </div>
      
           </div>
@endsection
