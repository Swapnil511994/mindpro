@extends('Partials.layout')
@section('content')

<div class="content-wrapper">
        
        <!-- right column -->
        <div class="col-md-6">
               <!-- Horizontal Form -->
               <div class="box box-info">
                 <div class="box-header with-border">
                   <h3 class="box-title">Edit Teacher Form</h3>
                 </div>
                 <!-- /.box-header -->
                 <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route("Teachers.update",$teacher->TeacherId)}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <input type="hidden" name="SubjectId" value="{{$teacher->TeacherId}}" />
                   <div class="box-body">
                     <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
     
                       <div class="col-sm-10">
                       <input type="text" class="form-control" name="Name" id="inputEmail3" placeholder="Name" value="{{$teacher->Name}}">
                       @error('Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>
                     </div>
                     <div class="form-group">
                       <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
     
                       <div class="col-sm-10">
                         <input type="text" class="form-control" id="inputPassword3" placeholder="Description" name="Email" 
                          value="{{$teacher->Email}}">
                            @error('Email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>
                     </div>
                     <div class="form-group">
                        <label for="contact" class="col-sm-2 control-label">Contact</label>
      
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="contact" placeholder="Description" name="Contact" 
                           value="{{$teacher->Contact}}">
                           @error('Contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="gender" class="col-sm-2 control-label">Gender</label>
      
                        <div class="col-sm-10">
                            {{Form::select('Gender',$genders,$teacher->Gender,["class"=>"form-control"])
                                   
                            }}
                            @error('Gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                      </div>

                   </div>
                   <!-- /.box-body -->
                   <div class="box-footer">
                     <button type="submit" class="btn btn-success">Save</button>
                     <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-primary" onclick="window.history.go(-1); return false;">Back</button>
                   </div>
                   <!-- /.box-footer -->
                 </form>
               </div>
               <!-- /.box -->
       </div>
</div>

@endsection