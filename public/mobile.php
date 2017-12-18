<?php $thisPage="Mobile";
include 'includes/navigation.php'; 
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, 
initial-scale=1.0">

<!--Custom css for mobile devices.-->
<style>
body {
	margin: 0;
}

ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: white;
}

li {
	float: left;
}

a {
	display: block;
	color: black;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
}

li a:hover:not(.active){
	background-color: #74a0e8;
}

li a.active {
	background-color: #3399ff;
}

li.right {
		float:right;
}

@media screen and (max-width: 600px) {
	ul.topnav li.right,
	ul.topnav li {
		float:none;
	}
}
</style>



<?php include 'includes/footer.php'?>