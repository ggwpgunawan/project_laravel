@extends('layouts.master')
@section ('content')

<h1> Edit Data Layanan</h1>
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
							    <form action ="/kategorilayanan/{{$kategorilayanan->id}}/update" method = "POST">
                                {{csrf_field()}}

                                <div class="form-group">
                                <label for="exampleInputEmail1">kategori</label>
                                <input name = kategori type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kategori" value="{{$kategoriproduk->kategori}}">   
                            </div>
                            
                            <div class="form-group">
                            <label for="exampleInputEmail1">deskripsi</label>
                                <input name = deskripsi type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="deskripsi" value="{{$kategoriproduk->deskripsi}}">   
                            </div>  
                             
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>  
                            </form>
                        </div>
      
           </div>
@endsection
