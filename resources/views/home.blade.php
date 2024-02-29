<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<style type="text/css">
			body{
				display:flex;
				justify-content:center;
				align-items:center;
				height:100vh;
				overflow:hidden;
				}
				h1{ 
					display:flex;
					font-size:5rem;
					letter-spacing:5px;
					
				}
			.tiktok-spinner{
				position:absolute;
				height:2.1em
				width:4.1em;
				
				
				}
			.ball{
				position:absolute;
				height:2em;
				width:2em;
				border-radius:50%;
				mix-blend-mode:multiply;

				}
			.ball.red{
				left:0;
				background:#f71375;
				animation:0.7s red-move ease-in-out infinite ;

				}
			.ball.blue{
				right:0;
				background:#37f7f6;
				animation:0.7s blue-move ease-in-out infinite;
				}
			@keyframes blue-move{
				25%{
					transform:scale(0.7);

				}
				50%{
					right:1.9em;
				}
				75%{
					transform:scale(1.2);

				}
				100%{
					right:0;
				}
				
				}
				@keyframes red-move{

				25%{
					transform:scale(1.2);

				}
				50%{
					left:1.9em;
				}
				75%{
					transform:scale(0.7);

				}
				100%{
					left:0;
				}




					}



					}
					
			#typing-text::after{
			content:'|';
			animation:blink 0.7s infinite alternate;
			display:inline-block;
			color:#333;
			
		}
		@keyframes blink{
			
			to {opacity:0};
		}
		
		#typing-text{
			font-family:Arial,sans-serif;
			font-size:36px;
			color:#333;
			text-align:center;
			
		}

					
					
		</style>
	</head>
	<body>
		<h1 id="typing-text"></h1>
		<div class="tiktok-spinner">
			<div class="ball red"></div>
			<div class="ball blue"></div>
		</div>
		
		<script>
		const text="Bethel Tabernacle";
		
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
	</body>
</html>