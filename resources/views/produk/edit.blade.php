@extends('layouts.master')
@section ('content')

<h1> Edit Data Produk</h1>
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
							    <form action ="/produk/{{$produk->id}}/update" method = "POST">
                                {{csrf_field()}}

                                <div class="form-group">
                                <label for="exampleInputEmail1">nama produk</label>
                                <input name = nama_produk type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama_produk" value="{{$produk->nama_produk}}">   
                            </div>
                            
                            <div class="form-group">
                            <label for="exampleInputEmail1">kategori</label>
                                <select name = "kategoriproduk_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kategoriproduk_id" >   
                                @foreach($kategori as $kategoriId => $kategoriLabel)
                                  <option value="{{$kategoriId}}">{{$kategoriLabel}}> </option>
                                  @endforeach
                                  </select>
                            </div>   

                            <div class="form-group">
                            <label for="exampleInputEmail1">Jenis</label>
                                <input name = "jenis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jenis" value="{{$produk->jenis}}">   
                            </div>  

                            <div class="form-group">
                            <label for="exampleInputEmail1">Brand</label>
                                <input name = brand type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand" value="{{$produk->brand}}">   
                            </div>  

                            <div class="form-group">
                            <label for="exampleInputEmail1">Type</label>
                                <input name = type type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type" value="{{$produk->type}}">   
                            </div> 

                            <div class="form-group">
                            <label for="exampleInputEmail1">deskripsi</label>
                                <input name = deskripsi type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="deskripsi" value="{{$produk->deskripsi}}">   
                            </div>  
                             
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>  
                            </form>
                        </div>
      
           </div>
@endsection
