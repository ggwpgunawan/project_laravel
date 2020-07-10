@extends('layouts.master')
@section ('content')

<h1> Edit Data vendor</h1>
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
							    <form action ="/vendor/{{$vendor->id}}/update" method = "POST">
                                {{csrf_field()}}

                                <div class="form-group">
                                <label for="exampleInputEmail1">vendor</label>
                                <input name = nama_vendor type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama_vendor" value="{{$vendor->nama_vendor}}">   
                            </div>
                            
                            <div class="form-group">
                            <label for="exampleInputEmail1">alamat</label>
                                <input name = alamat_vendor type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="alamat_vendor" value="{{$vendor->alamat_vendor}}">   
                            </div>   

                            <div class="form-group">
                            <label for="exampleInputEmail1">notelp</label>
                                <input name = no_telp type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="no_telp" value="{{$vendor->no_telp}}">   
                            </div>  

                            <div class="form-group">
                            <label for="exampleInputEmail1">email</label>
                                <input name = email type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" value="{{$vendor->email}}">   
                            </div>  

                            <div class="form-group">
                            <label for="exampleInputEmail1">deskripsi</label>
                                <input name = deskripsi type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="deskripsi" value="{{$vendor->deskripsi}}">   
                            </div>  
                             
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>  
                            </form>
                        </div>
      
           </div>
@endsection
