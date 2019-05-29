@extends('admin/adminlayout.app')
@section('title')
userdashboard
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Create & Maintains Event Here</div>

                <div class="card-body">
                   
                   
                    <a href="/createvent"> Create Event!</a>
                    <br><br>
                     <a href=""> Maintain Event!</a>
                     <br><br>
                      <a href=""> Invite User To Event!</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
           @if(session('msg'))
<div class="alert alert-info">
  {{session('msg')}}
  </div>
  @endif
             <div class="card">
                <div class="card-header">Invite users to events</div>
               
                <div class="card-body">
                  <form>
                    
                       @foreach($users as $value)
<hr>

                    <p>{{$value->name}}</p>

                      @foreach($events as $event)
                      <input type="checkbox" name="">{{$event->ename}}
                  
               
                   <a class="btn btn-primary" href="/invite/<?php echo $value->id ?>/<?php echo $event->id ?>">Click to Invite</a>


 @endforeach

 @endforeach

              </form>         
                 
                </div>
            </div>
        </div><!-- 8 -->
    </div>
</div>
<script type="text/javascript">
   $(function() {
    $('#myLink').click(function() {
        $('#mySlider').slideToggle();
    });
});
</script>
@endsection