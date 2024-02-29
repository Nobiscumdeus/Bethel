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
      
       
        background:#333;
        color:#fff;
        position:relative;
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
    .dayForm
    {
        display:none;
        opacity:0;
       /** transform:translateY(-20px); **/
        transition:opacity 2s ease-in,transform 2s ease;
        max-height:90px;
    }
    .dayForm.active
    {
      /**
        display:block;
        opacity:1;
        transform:translateY(0);
        **/
       display:block;
       position: absolute;
       top:0%;
       left:-9%;
       transform:translate(-50%,-50%);
       opacity:1;
       box-shadow:0 0 10px rgba(0,0,0,0.3);
     
       z-index:1;
    
   
  
        
        
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
footer 
{
text-align:center;
color:#fff;

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
.earth-circle
{
  width:450px;
  height:450px;
  border:2px solid #555555;
  content:"";
  border-radius:300px;
}
.sun
{
  position:absolute;
  width:100px;
  height:100px;
  background:#ffff00;
  border-radius:100px;
  box-shadow:0 0 50px #ffff00;
}
.earth
{
  position:absolute;
  width:50px;
  height:50px;
  background:green;
  top:-25px;
  border-radius:100px;
  animation:18s rotate linear infinite;
  transform-origin:30px 250px;


}
.moon-circle
{
  position:absolute;
  width:110px;
  height:110px;
  border:2px solid #555555;
  top:-30px;
  left:-30px;
  content:"";
  border-radius:110px;

}
.moon
{
  position:absolute;
  width:20px;
  height:20px;
  background:#ccc;
  top:-40px;
  left:15px;
  border-radius:50px;
  animation:1.5s rotate linear infinite;
  transform-origin:10px 65px;

}
.moon.no-background
{
  background:#000;
}
@keyframes rotate
{
  to
  {
    transform:rotate(360deg);
  }
}
footer.no-background
{
  color:#000;
}
#sundayForm,#wednesdayForm
{
  transform:scale(0.9);
  max-height:85vh;
}
#sundaytimes,#wednesdaytimes
{
  font-size:30px;
  color:red;
  width:50px;
  height:50px;
  border:2px solid #000;
  border-radius:50%;
}
#sundaytimes:hover,#wednesdaytimes:hover{
  cursor:pointer;
 

}
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
          
          <a class="navbar-brand text-light" href="#"><i class='fas fa-bible fa-2x' style='color:#fff'></i></a>
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
              <i id="backgroundToggleIcon" class="fas fa-adjust fa-2x "></i>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  See More
                </a>
                <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item text-light bg-dark" href="#">About Bethel Tabernacle</a></li>
                  <li><a class="dropdown-item text-light bg-dark " href="#">Contact Bethel Tabernacle</a></li>
                  <li><a class="dropdown-item text-light bg-dark" href="#">See Gallery</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

  
        @yield('content')
        
    
    


    <footer id="footer">
       <h5> Developed by<a href="https://chasfatprojects.netlify.app" target="_blank"> Chasfat Projects </a> &copy; <span id="currentYear"></span> </h5>
    </footer>

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




//State of form used by both the sunday and wednesday closePopups 
/**
var isPopupVisible=true;


function sundayclosePop()
{
  
  var sundayForm=document.getElementById("sundayForm"); //Collect the form/popup 
  isPopupVisible=!isPopupVisible;
  if(isPopupVisible)

  {
    sundayForm.style.opacity='0';
  sundayForm.style.display='none';

  }else
  {
    sundayForm.style.opacity='1';
  sundayForm.style.display='block';

  }
  /**
  sundayForm.style.opacity='0';
  setTimeout(function(){

    sundayForm.style.display='none';
  },300)
  
}
function wednesdayclosePop()
{

  var wednesdaypopup=document.getElementById("wednesdaytimes");
  var wednesdayForm=document.getElementById("wednesdayForm");
  wednesdayForm.style.opacity='0';
  setTimeout(function(){
    wednesdaypopup.style.display='none';
  },300)
}

**/

    
    function toggleForm(day)
    {
        const sundayForm=document.getElementById('sundayForm')
        const wednesdayForm=document.getElementById('wednesdayForm')

        if(day==='sunday')
        {
            //sundayForm.classList.add('active');
            sundayForm.classList.toggle('active');
            wednesdayForm.classList.remove('active');

           

        }
      
        else if(day==='wednesday')
        {
          //  wednesdayForm.classList.add('active');
          wednesdayForm.classList.toggle('active');

            sundayForm.classList.remove('active');
        }

    }
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
