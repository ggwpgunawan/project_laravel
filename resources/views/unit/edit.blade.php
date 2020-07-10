@extends('layouts.master')
@section ('content')

<h1> Edit Data Unit</h1>
                @if (session('sukses'))
                <div class="alert alert-success" role="alert">
                Data Berhasil Diinput!
                </div>
                @endif
                
<div class="main">
     <div class="main-content">
          <div class="container-fluid">
               <div class="row">
               <div class="col-md-6">
               <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Inputs</h3>
								</div>
								<div class="panel-body">
							    <form action ="/unit/{{$unit->id}}/update" method = "POST">
                             {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">code</label>
                                <input name = code type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Code" value="{{$unit->code}}">   
                                
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">name</label>
                                <input name = name type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="{{$unit->name}}">   
                            </div>   
                            </div> 
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>  
                            </form>
                        </div>
								</div>
							</div>

@stop
@section ('content1')
        <h1> Edit Data Unit</h1>
                @if (session('sukses'))
                <div class="alert alert-success" role="alert">
                Data Berhasil Diinput!
                </div>
                @endif
           <div class = "row">
           <div class ="col-lg-12">
                    <form action ="/unit/{{$unit->id}}/update" method = "POST">
                             {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">code</label>
                                <input name = code type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Code" value="{{$unit->code}}">   
                                
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">name</label>
                                <input name = name type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="{{$unit->name}}">   
                            </div>   
                            </div> 
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>  
                            </form>
                        </div>
      
           </div>
@endsection
