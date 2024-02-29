@extends('layout.bethel')
@section('title','Table for Wednesday ')


@section('content')


<table class="table table-responsive table-hover table-bordered container mt-5">
    <tr>
        
       <th colspan="9"> <h3 class="text-center"> Attendance for Wednesday Services </h3> </th>

    </tr>
    <tr>
        <th> Date </th>
        <th> Men  </th>
        <th> Women </th>
        <th> Children </th>
        <th> Guests </th>
        <th> Converts </th>
        <th> Total </th>
        <th> Minister </th>
        <th> Message </th>

    </tr>
    @foreach($wednesdayData as $data)

   <tr>
   <td> {{ $data->date}} </td>
    
        <td> {{ $data->men }}</td>
        <td> {{ $data->women }} </td>
        <td> {{ $data->children }} </td>
        <td>  {{ $data->guests }} </td>
        <td> {{ $data->converts }} </td>
        <td> {{ $data->total }} </td>
        <td> {{ $data->minister }} </td>
        <td> {{ $data->message }} </td>
       
   </tr>

    @endforeach 
  
    </tr>
</table>

@endsection 
