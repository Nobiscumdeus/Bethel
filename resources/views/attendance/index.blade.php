
@extends('layout.bethel')
@section('title','Bethel Tabernacle')



@section('styling')
.tiktok-spinner{
	display:flex;
	flex-direction:column;
	justify-content:center;
	align-items:center;
	place-self:center;
	min-height:50vh;
}
.tiktok-spinner h1{
	letter-spacing:10px;
}
		
.loader{
	width:50px;
	height:50px;
	position:relative;
}
.loader::before,
.loader::after{
	content:'';
	position:absolute;
	width:inherit;
	height:inherit;
	border-radius:50%;
	mix-blend-mode:multiply;
	animation:rotate 1s infinite cubic-bezier(0.77,0,0.175,1);
	
	
}
.loader::before{
	background-color:#fc3f9e;
	
}
.loader::after{
	background-color:#50e8f3;
	animation-delay:.5s;
}

@keyframes rotate{
	0%,100%{
		
		left:95px;
	}
	25%{
		transform:scale(.3);
	}
	50%{
		left:0;
	}
	75%{
		transform:scale(1);
	}
			
	.titktok-spinner #typing-text::after{
		content:'|';
		animation:blink 2.0s  infinite alternate;
	}
	
	@keyframes  blink{
		to{opacity:0;}
	}
	.tiktok-spinner #typing-text{
		font-family:Arial,sans-serif;
		font-size:36px;
		color:#333;
		margin:80px auto;
		text-align:center;
	}
		

@endsection
	@section('content')
		
		<div class="tiktok-spinner">
			
			<span class="loader"></span>
			<h1 id="typing-text"></h1>
		</div>
	
	<script>
	const text="Welcome to Bethel... ";
		
		//Get the h1 element 
		const typingText=document.getElementById('typing-text');
		//Function to animate typing text
		function typeText(text){
			let index=0;
			
			//Interval function  to add each letter of text 
			const interval=setInterval(()=>{
				typingText.textContent+=text[index];
				index++;
				
				//If the end of the text is reached,reset index and clear the content
				if(index===text.length){
					index=0;
					typingText.textContent='';
				}
			},150); //Value placed here for adjusting typing speed 
		}
		typeText(text);
	</script>

 

@endsection 