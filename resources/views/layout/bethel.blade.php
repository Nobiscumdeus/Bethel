<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style type="text/css">
    
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    body
    {
      
       
		min-height:100vh;
        background:linear-gradient(135deg,#4CAF50,#FF5722);
        color:#fff;
		
        
    }
	
	
    body.no-background
    {
      background:lightgray;
      color:#000;
    }

    #backgroundToggleIcon:hover
    {
      cursor:pointer;

    }
    #all
    {
      width:100%;
      min-height:100vh;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        flex-wrap:wrap;

    }
    .navbar-toggler {
    border-color: #fff; /* Change to your desired border color */
}
navbar-toggler-icon{
  border-color:#fff;
  color:#fff;
  background-color:#fff;
}
    
    /* CSS to change the color of the Navbar Toggler button and its lines */
.navbar-dark .navbar-toggler {
    background-color: #fff; /* Change to your desired background color */
}

.navbar-dark .navbar-toggler-icon {
    background-color: #fff; /* Change to the same background color */
    border-color: #fff; /* Change to the same border color */
}
 
.chart-container
{
  width:85%;
  min-height:10vh;
  display:flex;
  justify-content:center;
  flex-direction:column;
  transform:scale(0.8);
}

/** Solar System ***/
.solar-system
{
  position:relative;
  display:flex;
  align-items:center;
  justify-content:center;
  transform:scale(0.55);

}

footer{
	width:100%;
	text-align:center;
	margin-top:5px;
}
footer h5 a{
	color:#000;
}
@yield('styling')

    </style>


   <!--- Asset Files ----->

    
    
    <title>@yield('title') </title>
  
</head>
<body>
    
    <header>
        <!-- Your header content goes here -->
    </header>

   
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
          
         <!--
		 <a class="navbar-brand text-light" href="#"><i class='fas fa-bible fa-2x' style='color:#fff'></i></a>
          -->
		  <img src="{{ asset('img/IMG-20240227-WA0012-removebg-preview (1).png') }}" style="max-width:100px;" alt="description of myimage">
		  <a class="navbar-brand text-light" href="#">Bethel Tabernacle</a>
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-light"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{route('bethelattendance.index')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{route('bethelattendance.sundaychart')}}">Sunday Charts</a>
              </li>
               <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{route('bethelattendance.wednesdaychart')}}">Wednesday Charts</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{route('bethelattendance.sundaytable')}}">Sunday Table</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{route('bethelattendance.wednesdaytable')}}">Wednesday Table</a>
              </li>
			   <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{route('bethelattendance.sundayform')}}">Sunday Attendance Form </a>
              </li>
			   <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{route('bethelattendance.wednesdayform')}}">Wednesday Attendance Form</a>
              </li>
              <li class="nav-item">
              <i id="backgroundToggleIcon" class="fas fa-adjust fa-2x "></i>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>
	  
	  
	  
	
  
        @yield('content')
        

<div>
 <footer id="footer">
       <h5> Developed by<a href="https://chasfatprojects.netlify.app" target="_blank"> Chasfat Projects </a> &copy; <span id="currentYear"></span> </h5>
    </footer>
</div>
 


  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>
    <script>

      //Changing the background
      //get the background icon element  
        const backgroundToggleIcon=document.getElementById('backgroundToggleIcon');
        //Create a variable to track the background 
        let backgroundOn=true;

      //Adding a click event listener
      backgroundToggleIcon.addEventListener('click',function(){
        //Get the body element 
        const body=document.body;
        const footer=document.getElementById("footer");
        const moon=document.getElementById("moon")
        //Toggle the 'no-background' class on the body element 
       if(backgroundOn)
       {
        body.classList.add('no-background');
        footer.classList.add('no-background');
        moon.classList.add('no-background');
        
       }
       else{
        body.classList.remove('no-background');
        footer.classList.remove('no-background');
        moon.classList.remove('no-background');
       }
       //Update the background state
       backgroundOn=!backgroundOn;
      })

      //Updating the year
      const currentYear=new Date().getFullYear();

      //FInd the span element 
      const yearElement=document.getElementById('currentYear')

      yearElement.textContent=currentYear;









    $(document).ready(function(){
       

        //For Sunday
        const sundaymen = $('#sundaymen');
        const sundaywomen= $('#sundaywomen');
        const sundaychildren = $('#sundaychildren');
        const sundayconverts = $('#sundayconverts');
        const sundayguests=$('#sundayguests');
        const sundaytotal=$('#sundaytotal');
        const sundaytotaldisplay=$('#sundaytotaldisplay');
        
        //For Wednesday 
        const wednesdaymen= $('#wednesdaymen');
        const wednesdaywomen= $('#wednesdaywomen');
        const wednesdaychildren = $('#wednesdaychildren');
        const wednesdayconverts = $('#wednesdayconverts');
        const wednesdayguests=$('#wednesdayguests');
        const wednesdaytotal=$('#wednesdaytotal');
        const wednesdaytotaldisplay=$('#wednesdaytotaldisplay');

        function sundayTotalUpdate()
        {
            
       

            const men=parseInt(sundaymen.val())||0;
            const women=parseInt(sundaywomen.val())||0;
            const children=parseInt(sundaychildren.val())||0;
            const converts=parseInt(sundayconverts.val())||0;
            const guests=parseInt(sundayguests.val())||0;

             // Ensure values are within the desired range
           const total=men+women+children+guests+converts;

            sundaytotal.val(total);
            sundaytotaldisplay.val(total);
           
        }

        sundaymen.on('input',sundayTotalUpdate);
        sundaywomen.on('input',sundayTotalUpdate);
        sundaychildren.on('input',sundayTotalUpdate);
        sundayconverts.on('input',sundayTotalUpdate);
        sundayguests.on('input',sundayTotalUpdate);


        


        function wednesdayTotalUpdate()
        {
            
       

            const men=parseInt(wednesdaymen.val())||0;
            const women=parseInt(wednesdaywomen.val())||0;
            const children=parseInt(wednesdaychildren.val())||0;
            const converts=parseInt(wednesdayconverts.val())||0;
            const guests=parseInt(wednesdayguests.val())||0;

             // Ensure values are within the desired range
           const total=men+women+children+guests+converts;

            wednesdaytotal.val(total);
            wednesdaytotaldisplay.val(total);
           
        }

        wednesdaymen.on('input',wednesdayTotalUpdate);
        wednesdaywomen.on('input',wednesdayTotalUpdate);
        wednesdaychildren.on('input',wednesdayTotalUpdate);
        wednesdayconverts.on('input',wednesdayTotalUpdate);
        wednesdayguests.on('input',wednesdayTotalUpdate);


        

    })

    


    


    </script>
   
</body>
</html>