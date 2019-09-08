@extends('Partials.layout')
@section('content')

<div class="content-wrapper">
        
        <!-- right column -->
        <div class="col-md-6">
               <!-- Horizontal Form -->
               <div class="box box-info">
                 <div class="box-header with-border">
                   <h3 class="box-title">Create Subject form</h3>
                 </div>
                 <!-- /.box-header -->
                 <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route("Subject.store")}}">
                  @csrf
                   <div class="box-body">
                     <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
     
                       <div class="col-sm-10">
                         <input type="text" class="form-control" name="Name" id="inputEmail3" placeholder="Name">
                       </div>
                     </div>
                     <div class="form-group">
                       <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
     
                       <div class="col-sm-10">
                         <input type="text" class="form-control" id="inputPassword3" placeholder="Description" name="Description">
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