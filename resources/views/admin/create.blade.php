@extends('admin/adminlayout.app')
@section('title')
crateEvent
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	@if(session('msg'))
            <div class="alert alert-info">
               {{session('msg')}}
           </div>
           @endif
           <div class="card">
            <div class="card-header">Create An Event Here</div>

            <div class="card-body">

               <form  action="/storevent" method="post" enctype="multipart/form-data">
                  {{csrf_field()}} 
                  <div class="row"> 
                    <div class="col-md-6">

                  <div class="form-group">
                      <label>Event Name</label>
                      <input type="text" name="ename" class="form-control">
                      <span class="error" style="color: red">{{$errors->first('name')}}</span>
                  </div>

                  <div class="form-group">
                      <label>Event Time</label>
                      <input type="date" name="date" class="form-control">
                      <span class="error" style="color: red">{{$errors->first('date')}}</span>
                  </div>

                  <div class="form-group">
                      <label>Event Place</label>
                      <input type="text" name="location" class="form-control">
                      <span class="error" style="color: red">{{$errors->first('location')}}</span>
                  </div>
                  <div class="form-group">
                      <label>Event Description</label>
                      <textarea name="description" class="form-control" id="froala-editor"></textarea>
                  </div> 
</div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      
                        <div class="panel-body">
                            <div class="form-group">
                                <span class="error">{{$errors->first('lat')}}</span>
                                <span class="error">{{$errors->first('long')}}</span>
                                <google-map></google-map>

                            </div>



                        </div>


                    </div>
                </div><!-- 6 -->
            </div>
                <input type="submit" name="" class="btn btn-primary" value="Create An Event">
            </form>



        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/app.js')}}"></script>
<script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
    })
</script>


@endsection