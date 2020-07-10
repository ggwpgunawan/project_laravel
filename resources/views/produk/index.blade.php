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
                        <th>Produk </th>
                        <th>Kategori </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($produk as $p)
                    <tr>
                      <td> {{$p->nama_produk}}</td>
                      <td> {{$p->kategoriproduk->kategori}}</td>
                      <td> 
                         <a href="/produk/{{$p->id}}/edit" class = "btn btn-warning btn-sm"> Edit </a>
                         <a href="/produk/{{$p->id}}/delete" class = "btn btn-danger btn-sm "onclick ="return confirm ('yakin mau dihapus')"> Delete  </a> 
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form action ="/produk" method = "POST">
                             {{csrf_field()}}
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input name="nama_produk" type="text" class="form-control" id="nama_produk">   
                            </div>

                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="kategoriproduk_id" class="form-control" id="kategoriproduk_id">
                                  @foreach($kategori as $kategoriId => $kategoriLabel)
                                  <option value="{{$kategoriId}}">{{$kategoriLabel}}</option>
                                  @endforeach
                                </select>
                                
                            </div>   

                            <div class="form-group">
                                <label for="">Jenis</label>
                                <input name="jenis" type="text" class="form-control" id="jenis">   
                            </div>  

                            <div class="form-group">
                                <label for="">Brand</label>
                                <input name="brand" type="text" class="form-control" id="brand">   
                            </div>  

                            <div class="form-group">
                                <label for="">Type</label>
                                <input name="type" type="text" class="form-control" id="type">   
                            </div>  

                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <input name="deskripsi" type="text" class="form-control" id="deskripsi">   
                            </div>  
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
       