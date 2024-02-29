@extends('layout.bethel')
@section('title','Wednesday Attenndance Form')
@section('content') 
<div class="container-fluid">
 <!-- Wednesday Data -->
    <div class="row">
       
        <div class="col-md-9 offset-md-2 my-3 dayForm" id="wednesdayForm">
            <div class="card bg-transparent">
                <div class="card-header">
                   <!-- <h2> Attendance for Wednesdays </h2> -->
                   <div class="row"> <div class="col-md-9"> <h2 class="text-black"> Attendance for Wednesdays</h2></div></div>
                </div> <!-- End  of card header -->
          <div class="card-body">
                <form class="form"  method="POST" action="{{route('bethelattendancewednesday.store')}}" id="wednesdayForm">
                   @csrf
                   @method('POST')
                    <div class="form-group mb-3">
                        <input type="number" class="form-control form-control-lg" name="men" id="wednesdaymen" placeholder="Number of men" min="0" max="500" required />
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" class="form-control form-control-lg" name="women" id="wednesdaywomen" placeholder="Number of women"  min="0" max="500" required />
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" class="form-control form-control-lg" name="children" id="wednesdaychildren" placeholder="Number of children"  min="0" max="500" required />
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" class="form-control form-control-lg" name="guests" id="wednesdayguests" placeholder="Number of guests"  min="0" max="500" required />
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" class="form-control form-control-lg" name="converts" id="wednesdayconverts" placeholder="Number of converts"  min="0" max="500" required />
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" class="form-control form-control-lg" name="total" id="wednesdaytotal" />
                    </div>
                    <div class="form-group mb-3">
                       <input type="text" class="form-control form-control-lg " placeholder="Sum of Attendance" aria-label="Real time total" disabled />
                       <input type="text" class="form-control form-control-lg" id="wednesdaytotaldisplay" readonly/>
                       
                    </div>
                    <div class="row">
                        <div class="col">
                    <div class="form-group mb-3">
                        <input type="string" class="form-control form-control-lg" name="message" id="wednesdaymessage" placeholder="Title of Message" required />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <input type="string" class="form-control form-control-lg" name="minister" id="wednesdayminister" placeholder="Name of Minister" required />
                    </div>
                </div>
                </div>
                    <div class="form-group mb-3">
                        <input type="date" class="form-control form-control-lg" name="date" id="wednesdaydate"  required />
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg"> Upload</button>
                </form>
          </div> 
            </div> <!-- End of card itself -->
       
    </div> 
</div>
@endsection