@extends('layout.bethel')
@section('title','Sunday Attendance Form')


@section('content')


<div class="container-fluid">
 <div class="row">

<!-- Sunday Data -->
        <div class="col-md-9 offset-md-2 my-3 dayForm" id="sundayForm">
            <div class="card bg-transparent ">
            <div class="card-header">
           <!--    <h2> Attendance for Sundays </h2> -->
           <div class="row"> <div class="col-md-12"> <h2 class="text-black"> Attendance for Sundays </h2></div></div>
             
              
            </div>
            <div class="card-body py-3">
                

            <form class="form "  method="POST" action="{{route('bethelattendancesunday.store')}}" id="sundayForm">
                @csrf
                @method('POST')
                <div class="form-group mb-3">
                    
                    <input type="number" class="form-control form-control-lg" name="men" id="sundaymen" placeholder="Number of men" min="0" max="500" required />
                </div>
                <div class="form-group mb-3">
                    <input type="number" class="form-control form-control-lg" name="women" id="sundaywomen" placeholder="Number of women"  min="0" max="500" required />
                </div>
                <div class="form-group mb-3">
                    <input type="number" class="form-control form-control-lg" name="children" id="sundaychildren" placeholder="Number of children"  min="0" max="500" required />
                </div>
                <div class="form-group mb-3">
                    <input type="number" class="form-control form-control-lg" name="guests" id="sundayguests" placeholder="Number of guests"  min="0" max="500" required />
                </div>
				
                <div class="form-group mb-3">
                    <input type="number" class="form-control form-control-lg" name="converts" id="sundayconverts" placeholder="Number of converts"  min="0" max="500" required />
                </div>
                <div class="form-group mb-3">
                    <input type="hidden" class="form-control form-control-lg" name="total" id="sundaytotal" />
                </div>

                <div class="form-group mb-3">
                    <input type="text" class="form-control form-control-lg" placeholder="Sum of Attendance" aria-label="Real time total" disabled />
                   <input type="text" class="form-control form-control-lg" id="sundaytotaldisplay" readonly/>
                </div>
                <div class="row">
                    <div class="col">
                <div class="form-group mb-3">
                    <input type="string" class="form-control form-control-lg" name="message" id="sundaymessage" placeholder="Title of Message" required />
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-3">
                    <input type="string" class="form-control form-control-lg" name="minister" id="sundayminister" placeholder="Name of Minister" required />
                </div>
            </div>
            </div>
                <div class="form-group mb-3">
                    <input type="date" class="form-control form-control-lg" name="date" id="sundaydate" placeholder="Enter the Date" required />
                </div>
                <button type="submit" class="btn btn-success btn-lg"> Upload </button>
            </form>
        </div> <!---  ends the card body 
        <div class="card-footer bg-dark text-light my-2">
          
            <h5>Bethel Tabernacle is the place to be ...</h5>
        </div>
-->

        </div>

        </div>
    </div>
 
</div>







@endsection