<html>
<head>
<title>template</title>
<link rel="stylesheet" type="text/css" href="mainpage2.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<div>
  <img class="mySlides" src="1.jpg" width=100%>
  <img class="mySlides" src="2.jpg" width=100%>
  <img class="mySlides" src="3.jpg" width=100%>
  <img class="mySlides" src="4.jpg" width=100%>
  <img class="mySlides" src="5.jpg" width=100%>
</div><br>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>



<div style="border-left: 2%;width:80%;height:40px;background:#ffffff;margin-left: 10%;margin-right: 10%;border-radius: 5PX">
	<div  style="margin-left:0px;float:left;border:2%;height:40px;border-radius:5px;z-index:2;overflow:hidden;background-color:#111; width: 18%;padding:10px;" ><font color="white"> &nbsp &nbsp&nbspIMPORTANT NOTICE: </font>
	</div>

	<div class="marquee">
		<marquee>this is notice board</marquee>
	</div>
</div>

<br><br><br>

<div style="margin-left:-2%;margin-right:9%;">
	<div style="">
		<div class="block" style="width:56.5%">
<!-- Space for search tabs-->
			<div style="margin:1%;height:96%;border-radius:5px;background-color:grey">
				<div style="background-color:#333;width:100%;height:30px;">
					<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">CALCULATE VARIABLES</font>
				</div>
				<br><br>
				<form autocomplete="off" action="findroute.php" method="POST">
					<div style="padding-left: 5%;width:90%">
						<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">From Station :  
						 		<div class="autocomplete" style="width:100%">
						 			<font style="font-size:70%;font-family:arial;color:black;">
    							<input id="station1" type="text" name="station1" style="width:75%;background-color:lightgrey;border-radius: 5px;height:30px; "placeholder="Station"></font>
 							 </div>
						</font>
					</div>
					<br><br>
					<div style="padding-left: 5%;width:90%">
						<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">To Station :&nbsp&nbsp&nbsp  
							<div class="autocomplete">
						 			<font style="font-size:70%;font-family:arial;color:black;">
    							<input id="station2" type="text" name="station2" style="width:75%;background-color:lightgrey;border-radius: 5px;height:30px; "placeholder="Station"></font>
 							 </div>
						</font>
					</div>
					<br><br>
					<div style="padding-left: 5%;width:90%">
						<font style="font-size:100%; color:white;font-family: caviar;text-align: left;">Additional Information: 
						<br><br>
						<input type="checkbox" value="nearby" name="nearby" id="nearby"> Nearby Hotspots<br><br>
						<input type="checkbox" value="parking" name="parking" id="parking"> Parking Availablity<br><br>

						<br>
						<div style="padding-left:70%;width:100%;">
							<input type="submit" Value="SEARCH"style="width:80%;height:30px;border-radius: 3px; background-color:lightgrey">
						</div>
						</font>
					</div>
				</form>



			</div>	
		</div>

		<div class="block">
			<div style="margin: 2%;background-color:grey;">
				<div style="background-color:#333;width:100%;height:30px;">
					<font style="font-size:150%; color:white;font-family: caviar;text-align: left;"> NETWORK MAP</font>
				</div>
				<br>
				<a href="networkmap2.html" ><img src="Mapenglish_070818.jpg" style="width:100%;height:85%"></a>
			</div>
		</div>
	</div>
	<div style="margin-left:-12%">
		<div class="block" style="width:23%;margin-top:3.5%;;height:450px">
			<div style="margin:2%;height:96%;border-radius:5px;background-color:grey">
				<div style="background-color:#333;width:100%;height:30px;">
					<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">USER LOGIN</font>
				</div>
				<br><br>
				<form oninput="validate()" onsubmit="return validate()" action="userlogin.php" method="POST">
					<div style="padding-left:15%;width:90%;align-content: center">
						<font style="font-size:150%;color:white;font-family: caviar;text-align:left;">Enter Card Number: 
							<br><br>
							<input type="number" id="cnumber" name="cnumber" style="width:75%;background-color:lightgrey;border-radius: 5px;height:30px; ">
						</font>
						<?php
							if($_POST)
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
							$sql="select count(code) as count from graphstructure where 1 ;";
								$res=$conn->query($sql);
								if($res->num_rows>0)
									{
									while($row=$res->fetch_assoc())
										{
										$v=$row['count'];
										}
									}
							?>
						<br><br>
						<p id="cardnumber" style="display:contents;"><font style="color:red">Invalid Card Number:<br>Should Contain 8 Digits only</font></p>
						<br><br><br><br>
						<div style="padding-left:55%;width:100%;">
							<input type="submit" Value="LOGIN"style="width:80%;height:30px;border-radius: 3px; background-color:lightgrey">
						</div>
					</div>
				</form>
			</div>
		</div>

		</div>
		<div class="block" style="width:26%;margin-top:4%;height:450px">
			<div style="margin:2%;height:96%;border-radius:5px;background-color:grey">
				<div style="background-color:#333;width:100%;height:30px;">
					<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">EVENTS NEARBY</font>
				</div>
				
					<div style="margin-top:20px">
						 <ul style="list-style-type:disc:background-color:grey">
							  <li style="width:100%"><a href="https://paytm.com/events/delhi/comic-con/delhi-comic-con-2018/173570">Delhi ComicCon 2018</a></li>
							  
							  <li style="width:100%"><a href="https://paytm.com/events/delhi/martin-garrix/power-arena-martin-garrix-india-tour-delhi/177459">Martin Garrix India Tour</a></li>
							  <li style="width:100%"><a href="https://paytm.com/events/delhi/food-fest/the-elp-food-fest-eat-love-party-at-jawaharlal-nehru-stadium/178585">ELP Food Fest, JLN Stadium</a></li>
							 
							  <li  style="width:100%"><a href="https://paytm.com/events/delhi/food-fest/the-elp-food-fest-eat-love-party-at-expocentre-noida/178584">Food Fest, Noida</a></li>
							  <li  style="width:100%"><a href="https://paytm.com/events/delhi/food-fest/delhi-food-truck-festival/179473">Delhi Food Truck Festival</a></li>
							  <li  style="width:100%"><a href="https://paytm.com/events/Delhi-NCR">More Events</a></li>
						</ul> 
						
					</div>

				<br>
			</div>
		</div>
		<div class="block" style="margin-top:4%;width:27%;height:450px">
			<div style="margin:2%;height:96%;border-radius:5px;background-color:grey">
				<div style="background-color:#333;width:100%;height:30px;">
					<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">HOTSPOTS DETAILS</font>
				</div>
				<br><br>
				<form>
					<div style="padding-left:15%;width:90%;align-content: center">
						<font style="font-size:150%;color:white;font-family: caviar;text-align:left;">Enter Station :
							<br><br>
							<div class="autocomplete" style="width:100%">
						 			<font style="font-size:70%;font-family:arial;color:black;">
    							<input id="station3" type="text" name="stationname3" style="width:75%;background-color:lightgrey;border-radius: 5px;height:30px; " placeholder="Station"></font>
 							 </div>
						</font>
						<br><br>Under Maintainance<br><br><br><br>
						<div style="padding-left:55%;width:100%;">
							<input type="submit" Value="FIND"style="width:80%;height:30px;border-radius: 3px; background-color:lightgrey">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div style="margin-top: 75%;width:99.5%">
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


<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
<?php
echo "stations=[ ";
			$sql="select Station_name from graphstructure where 1;";
			$res=$conn->query($sql);
			$c=0;
				if($res->num_rows>0)
				{
					while($row=$res->fetch_assoc())
					{
						echo '"'.$row['Station_name'].'"';
						echo"\n";
						if($c!=$v-1)
							echo ",";
						$c=$c+1;
					}
				}
			echo "];";

?>
autocomplete(document.getElementById("station1"), stations);
autocomplete(document.getElementById("station2"), stations);
autocomplete(document.getElementById("station3"), stations);
</script>


</body>
</html>