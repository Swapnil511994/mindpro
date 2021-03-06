@extends('Partials.layout')
@section('content')

<div class="content-wrapper">
        
        <!-- right column -->
        <div class="col-md-6">
               <!-- Horizontal Form -->
               <div class="box box-info">
                 <div class="box-header with-border">
                   <h3 class="box-title">Edit Class form</h3>
                 </div>
                 <!-- /.box-header -->
                 <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route("Classes.update",$cls->ClassId)}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <input type="hidden" name="ClassId" value="{{$cls->ClassId}}" />
                   <div class="box-body">
                     <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
     
                       <div class="col-sm-10">
                       <input type="text" class="form-control" name="Name" id="inputEmail3" placeholder="Name" value="{{$cls->Name}}">
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