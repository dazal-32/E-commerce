<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
			<title>Log in page</title>
			<style>
			.one{
				height:5em;
				width:80%;
				border:1px solid red;
				margin:1em auto;
				padding:1em;
			}
			.one:nth-child(odd){
				border:1px solid green;
			}
			.btn{
				width:100%;
				display:flex;
				justify-content:center;
				align-items:center;
			}
			button{
				border:0;
				width:3em;
				color:#fff;
				background:red;
			}
			.one:nth-child(odd) button{
			background:green;
			}
			</style>
		</head>
	<body>
	<?php
		 $i=0;
		 while($i<9){
?>
<div class="one">
 <h3>This is div <?php echo $i ?></h3>
 <div class="btn">
 <button>div</button>
 </div>
</div>
<?php
		 	$i++;
		 	die();
		 }	 
?>
	</body>
	</html>