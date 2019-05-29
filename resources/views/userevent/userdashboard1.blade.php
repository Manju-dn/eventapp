@extends('layouts.app')
@section('title')
userdashboard
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
       @if(session('cancel_confirm'))
       <div class="alert alert-danger">
        {{session('cancel_confirm')}}
    </div>

    @endif


    @if(session('confirm'))
    <div class="alert alert-success">
        {{session('confirm')}}
    </div>

    @endif
    <div class="card">
        <div class="card-header" style="background-color:"><p>Toal Number Of Invitation:<b> <span class="badge badge-dark">{{$count_events}}</span></b>
            <br>Attending Events:<b><span class="badge badge-dark">{{ $attending_events}}</span></b></p></div>
            

            <div class="card-body">  
                <div class="row">
                    <p></p>
                    <div class="col-md-6">

                     <h3><span class="badge badge-dark">Pending events</span></h3>
                     <?php
    if($get_pendig_events->isEmpty()){
    echo "<h2>currently there is pending invitation</h2>";
    }

 ?>
                     
                     @foreach($events as $event)
                     
                     <?php  if ($event->confirm==0) { ?>
                     <p>Event Name:<b>{{$event->event_name}}</b></p>
                     <p>Event Date:<b>{{$event->date}}</b></p>
                     <p>Event Location:<b>{{$event->location}}</b></p>


                      <a href="/attendevent/<?php echo $event->id ?>" class="btn btn-success">Attend</a>
                  <?php } ?>
                    <!--  <?php  if ($event->confirm==0) { ?>

                        
                    <a href="/attendevent/<?php echo $event->id ?>" class="btn btn-success">Attend</a>
                   <?php } else { ?>
                    <a class="btn btn-primary" disabled>Attending</a>
                    <a href="/cancel_event/<?php echo $event->id ?>" class="btn btn-primary active">Cancel Attendance</a>
                    
                <?php } ?> -->
                <hr>

                @endforeach 
            </div><!-- 4 -->
            <div class="col-md-6"> 
             <h3> <span class="badge badge-dark">Attending events</span></h3>

             @foreach($get_attending_events as $value) 
                <p>Event Name:<b>{{$value->event_name}}</b></p>
                <p>Event Date:<b>{{$value->date}}</b></p>
                 <p>Event Ivited By:<b>{{$value->event_invited_by}}</b></p>
                 <a href="/cancel_event/<?php echo $value->id ?>" class="btn btn-danger">Cance</a>
                      <hr>
             @endforeach

         </div><!-- 4 -->
     </div><!-- r -->
 </div><!-- card-body -->
</div>
</div>
</div>

@endsection
