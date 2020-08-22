<html>
<head>
	<title>user login</title>
	<link rel="stylesheet" type="text/css" href="userlogin.css">
	<script type="text/javascript">
	function validate()
	{
		var cnum=document.getElementById("cnumber").value;
		var x=document.getElementById("cardnumber");
		if(cnum.toString().length==8)
		{
			if(!isNaN(cnum))
			{	
				x.style.display="none";
				return true;
			}
			else
			{
				x.style.display="contents";
				return false;
			}
		}
		else
		{
			x.style.display="contents";
			return false;
		}
		return false;
	}
</script>
</head>

<body>

<div>
	<nav class="floating-head">
		<a href="mainpage2.php" ><img src="delhi-metro-logo-635.png" align= "left" width=100px height=100px></a>
		<img src="helpline.png" width=200px height=100px align="right">
		<font style="font-size:250%; color:black;font-family: caviar;text-align: left;padding: 10px">DELHI METRO RAIL CORPORATION</font><br>
		<font style="font-size:100%; color:black;font-family: caviar-light; text-align: left;padding: 10px">(An Joint Venture Of Govt. Of INDIA And Govt. Of NCT DELHI)</font>
	</nav>
</div>

<div class="tab">
	<nav>
		<ul>
			<li><a class="active" href="mainpage2.php">HOME</a></li>
			<li><a href="http://www.delhimetrorail.com/about_us.aspx">ABOUT US</a></li>
			<li><a href="userlogin.php">PASSENGERS</a></li>
			<li><a href="findroute.php">FIND ROUTE</a></li>
		</ul>
	</nav>
</div>

<div style="border-left: 2%;width:80%;background:#ffffff;margin-left: 10%;margin-right: 10%;border-radius: 5PX">
	<div  style="margin-left:0px;float:left;border:2%;border-radius:5px;z-index:2;overflow:hidden;background-color:#111; width: 18%; height:20px; padding:10px;" ><font color="white"> &nbsp &nbsp&nbspIMPORTANT NOTICE: </font></div>
	<div class="marquee">
		<marquee>this is notice board</marquee>
	</div>
</div>
<br><br>
<div style="margin:30px;margin-right:30px;border:5px;border-radius:5px;z-index:2;overflow:hidden;background-color:#111; width: 95%; height:100%;margin-bottom: 30px; padding:10px;">

	<div style="margin: 30px;background-color:grey;border-radius:5px;">
			<div style="background-color:#333;width:100%;height:30px;">
				<font style="font-size:150%; color:white;font-family: caviar;text-align: left;"> &nbspUSER LOGIN</font>
			</div>
			<form oninput="validate()" onsubmit="return validate()" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<div style="padding-left:15%;width:90%;align-content: center">
						<br>
						<font style="font-size:150%;color:white;font-family: caviar;text-align:left;">Enter Card Number: 
							<br><br>
							<input type="number" id="cnumber" name="cnumber" style="width:75%;background-color:lightgrey;border-radius: 5px;height:30px; ">
						</font>
						<br><br>
						<p id="cardnumber" style="display:contents;"><font style="color:red">Invalid Card Number: Should Contain 8 Digits only</font></p>
						<br><br>
						<div style="padding-left:55%;width:100%;">
							<input type="submit" Value="GET DETAILS"  style="width:20%;height:30px;border-radius: 3px; background-color:lightgrey">
							<br><br>
						</div>
					</div>
			</form>
	</div>
	<div style="margin:5%">
			
	<?php
	if($_POST){
				$num=$_POST["cnumber"];
				echo "<font style='font-size:100%;color:white'>";
				$conn=mysqli_connect("localhost","root","");
				if($conn->error==NULL)
				{}
				else
					echo "connection failed";
				$sql="use delhimetro;";
				$conn->query($sql);
				
				echo "</font>";
			}
	?>
	<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">
		Card Number: 
			<?php 
			if($_POST)
				echo $num;
			?><br>
		Balance: Rs.
			<?php
			if($_POST)
			{
				$sql="select balance from userinfo where userid=$num;";
				$res=$conn->query($sql);
				if($res->num_rows>0)
				{
					while($row=$res->fetch_assoc())
					{
						echo $row["balance"];
					}
				}
				else
				{
					echo "USER DOES NOT EXISTS";
				}
			}
			?>
	</font>
	<font style="font-size:100%; color:white;font-family: caviar;text-align: left;">
		<br><br><br>
		TRAVEL HISTORY:
		<br><br>
		<table border=1 style="border-radius:10px; color:white; width:100%">
			<th>Date</th><th>From Station</th><th> To Station </th><th>Distance (KM.)</th><th>Charges (Rs.)</th>
			<?php
			if($_POST)
			{
			$sql="select * from travelinfo where userid=$num;";
				$res=$conn->query($sql);
				if($res->num_rows>0)
				{
					while($row=$res->fetch_assoc())
					{
						echo "<tr><td>".$row["date"]."</td><td>".$row["fromSta"]."</td>"."<td>".$row["toSta"]."</td>"."<td>".$row["distance"]."</td>"."<td>".$row["charge"]."</td></tr>";
					}
				}
			}
			?>
		</table>
	</font>
	</div>
	
</div>
<div style="margin-top: 0%;width:99.5%">
	<div style="margin-top:2px;margin-left:0px;float:bottom;z-index:0;overflow:hidden;background-color:#111; width: 100.5%; height:300px; padding:10px;">
		<div id ="details"  style="margin:2%;height:100%;width:95%;border-radius:5px;background-color:grey;border-radius: 5px;display:hidden">
				<div style="background-color:#8B0000;width:100%;height:30px;">
					<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">CONTACT INFORMATION</font>
				</div>
				<div style="margin:5px: width:25%;float:left;">
					<font style="font-size:100%; color:white;font-family: caviar;text-align: left;"><br>Metro Bhawan Fire Brigade Lane,<br> Barakhamba Road,<br>
					New Delhi - 110001, India<br>
					Board No. - 011-23417910/11/12<br>
					<br>
					<br>
					DMRC Helpline nos.
					155370<br>
					</font>
				</div><div style="margin:5px: width:43%;float:left;">
					<font style="font-size:200%; color:white;font-family: caviar;text-align: center;">
						<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTHANK YOU FOR USING DMRC.<br>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspALWAYS AT YOUR SERVICE.
					</font>
				</div>
				<div style="width:22%;height:92%;float:right"
				<a><img src="picture.jpg" style="width:100%;height:100%"></a>
				</div>

		</div>
			
	

	</div>
</div>

</body>
</html>