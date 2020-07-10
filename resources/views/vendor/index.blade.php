@extends('layouts.master')

@section ('content')


       @if (session('sukses'))
       <div class="alert alert-success" role="alert">
      Data Berhasil Diinput!
      </div>
      @endif
         
                 <div class = "col-12">
                     <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary btn-sm" float-right  data-toggle="modal" data-target="#exampleModal">
                  Add
                 </button>                       
         
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                       <tr>
                           <th>Vendor </th>
                           <th>Alamat </th>
                           <th>NoTelp</th>
                           <th>Email</th>
                           <th>Deskripsi</th>
                           <th>Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                     @foreach ($vendor1 as $vendor)
                       <tr>
                        <td> {{$vendor->nama_vendor}}</td>
                        <td> {{$vendor->alamat_vendor}}</td>
                        <td> {{$vendor->no_telp}}</td>
                        <td> {{$vendor->email}}</td>
                        <td> {{$vendor->deskripsi}}</td>
                        <td> 
                           <a href="/vendor/{{$vendor->id}}/edit" class = "btn btn-warning btn-sm"> Edit </a>
                           <a href="/vendor/{{$vendor->id}}/delete" class = "btn btn-danger btn-sm "onclick ="return confirm ('yakin mau dihapus')"> Delete  </a>
                           </td>
                      </tr>
                    @endforeach
                   </tbody>
                 </table>     
                             </div>
                           </div>
                         </div>
         
         
        
			<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Vendor Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       {{-- menampilkan error validasi --}}
       @if (count($errors) > 0)
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
       @endif

      <div class="modal-body">
                    <form action ="/vendor/create" method = "POST">
                             {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">vendor</label>
                                <input name = nama_vendor type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                               {{-- menampilkan error validasi
                                
                                @error('nama_vendor')
                                <div class ="text-danger mt-2">
                                  {{ $message }}
                                </div>
                                    
                                @enderror
                                
                                --}}
                                 
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">alamat vendor</label>
                                <input name = alamat_vendor type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
                            </div>   
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">no telp</label>
                                    <input name = no_telp type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
                                  
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">email</label>
                                    <input name = email type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">deskripsi</label>
                                    <input name = deskripsi type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
                                  
                            </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   
</div>
</div>         
</div>
</div>
</div>
@endsection