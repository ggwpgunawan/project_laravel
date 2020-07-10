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
                      <th>Code</th>
                        <th>Name Unit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                  @foreach ($dunit as $unit)
                <tr>

                    <td> {{$unit->code}}</td>
                    <td> {{$unit->name}}</td>
                    <td> 
                       <a href="/unit/{{$unit->id}}/edit" class = "btn btn-warning btn-sm"> Edit </a>
                       <a href="/unit/{{$unit->id}}/delete" class = "btn btn-danger btn-sm "onclick ="return confirm ('yakin mau dihapus')"> Delete  </a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Unit Baru</h5>
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
                    <form action ="/unit/create" method = "POST">
                             {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">code</label>
                                <input name = code type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Code">   
                                
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">name</label>
                                <input name = name type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">   
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
       