<html>
<head>
	<title>Find Route</title>
	<link rel="stylesheet" type="text/css" href="findroute.css">

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
			<li><a href="mainpage2.php">HOME</a></li>
			<li><a href="http://www.delhimetrorail.com/about_us.aspx">ABOUT US</a></li>
			<li><a href="userlogin.php">PASSENGERS</a></li>
			<li><a class="active" href="findroute.php">FIND ROUTE</a></li>
		</ul>
	</nav>
</div>

<div style="height:50px;">
<div style="border-left: 2%;width:80%;height:40px;background:#ffffff;margin-left: 10%;margin-right: 10%;border-radius: 5px">
	<div  style="margin-left:0px;float:left;height:40px;border:2%;border-radius:5px;z-index:2;overflow:hidden;background-color:#111; width: 18%; padding:10px;" ><font color="white"> &nbsp &nbsp&nbspIMPORTANT NOTICE: </font></div>
	<div class="marquee" style="height:40px;">
	<marquee>this is notice board</marquee>
	</div>
</div>
</div>
<br><br>
<div id ="datablock" style="margin:30px;margin-right:30px;border:5px;border-radius:5px;z-index:2;overflow:hidden;background-color:#111; width: 95%; height:75%;margin-bottom: 30px; padding:10px;">
	<div style="margin:2%;height:500px;border-radius:5px;background-color:grey;border-radius: 5px;">
				<div style="background-color:#333;width:100%;height:30px;">
					<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">CALCULATE VARIABLES</font>
				</div>
				<br><br>
				<form autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
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
			<div id ="details"  style="margin:2%;height:300px;border-radius:5px;background-color:grey;border-radius: 5px;display:hidden">
				<div style="background-color:#333;width:100%;height:30px;">
					<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">DETAILS</font>
				</div>
				<br>
				<div style="margin:5px;">
					<font style="font-size:120%; color:white;font-family: caviar;text-align: left;">
					<p id="shortestdist">Shortest Path Length : </p>
					<p id="time">Average Time : </p>
					<p id="station_count">No. Of Stations : </p>
					<p id="fare">Average Fare : </p>
					<p id="park_facility"></p>
				</font>
				</div>
			</div>
			<div id ="details"  style="margin:2%;height:1.5%;border-radius:5px;background-color:grey;border-radius: 5px;display:hidden">
				<div style="background-color:#333;width:100%;height:30px;">
					<font style="font-size:150%; color:white;font-family: caviar;text-align: left;">SHORTEST ROUTE</font>
				</div>
			</div>
<?php
	if($_POST){
				$station1=$_POST["station1"];
				$station2=$_POST["station2"];
				$nearby= isset($_POST["nearby"]) ? $_POST["nearby"] : NULL;
				$parking= isset($_POST["parking"]) ? $_POST["parking"] : NULL;
					echo "<script type='text/javascript'> var pf=".$parking.";</script>";
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

	 <script type='text/javascript'>
	<?php 
	$sql="select count(code) as count from graphstructure where 1 ;";
		$res=$conn->query($sql);
		if($res->num_rows>0)
				{
					while($row=$res->fetch_assoc())
					{
						echo "var v=".$row["count"].";";
						$v=$row['count'];
					}
				}
		if($_POST)
		{
					echo"var graph= [ ";
								$out=0;
							while($out<$v)
							{
								$in=0;
								echo "[ ";
								while($in<$v-1)
								{	
									echo "0,";
									$in++;
								}
								echo"0]";
								if($out<$v-1)
									echo",";
								$out++;
							}
							echo"];";

			$sql="SELECT Station_name,no_of_stations,code,node1, dist1, node2, dist2, node3, dist3, node4, dist4,node5,dist5 FROM `graphstructure` WHERE 1 ;";
				$res=$conn->query($sql);
				if($res->num_rows>0)
				{
					while($row=$res->fetch_assoc())
					{

						if($row["node1"]!=0)
						{
							$r=$row['code']-1;
							$c=$row['node1']-1;
							echo "graph[".$r."][".$c."]=".$row['dist1'].";";
							echo "\n";
						}
						if($row["node2"]!=0)
						{
							$r=$row['code']-1;
							$c=$row['node2']-1;
							echo "graph[".$r."][".$c."]=".$row['dist2'].";";echo "\n";
						}
						if($row["node3"]!=0)
						{
							$r=$row['code']-1;
							$c=$row['node3']-1;
							echo "graph[".$r."][".$c."]=".$row['dist3'].";";echo "\n";
						}
						if($row["node4"]!=0)
						{
							$r=$row['code']-1;
							$c=$row['node4']-1;
							echo "graph[".$r."][".$c."]=".$row['dist4'].";";echo "\n";
						}
						if($row["node5"]!=0)
						{
							$r=$row['code']-1;
							$c=$row['node5']-1;
							echo "graph[".$r."][".$c."]=".$row['dist5'].";";echo "\n";
						}
					}
				}

			echo "station_details=[ ";
			$sql="select color,Station_name,code from graphstructure where 1;";
			$res=$conn->query($sql);
			$c=0;
				if($res->num_rows>0)
				{
					while($row=$res->fetch_assoc())
					{
						echo "['".$row['Station_name']."','".$row['color']."',".$row['code']."-1]";
						echo"\n";
						if($c!=$v-1)
							echo ",";
						$c=$c+1;
					}
				}
			echo "];";

			$sql="select status from parking where Station_name='".$station1."';";
			$res=$conn->query($sql);
			if($res->num_rows>0)
			{
				while($row=$res->fetch_assoc())
				{
					echo "var park_value = '".$row['status']."';";
				}
			}

		}
	?>
</script>
<script>

if(<?php if($_POST)
			echo "true";
			else
			echo "false"; ?>	)
{
var start_s=<?php 
if($_POST)
echo "'".$station1."'" ?>;
var end_s=<?php 
if($_POST)
echo "'".$station2."'" ?>;

for(var i=0;i<247;i++)
{
	if(station_details[i][0]==start_s)
	{
		var startcode=station_details[i][2];
	}
	if(station_details[i][0]==end_s)
	{
		var endcode=station_details[i][2];
	}
}

console.log(startcode);
console.log(park_value);
console.log(endcode);
var int_max=2147483647;
var dist=[]; 
var sptSet=[];
var parent=[];
var path=[];
var min_dist=0;

djikstra(startcode,endcode);

function printpath(targ,parent)
{
	if(parent[targ]==-1)
		return;
	
	printpath(parent[targ],parent);
	path.push(targ);
}

function printSolution(src,targ)
{
	path.push(src);
	printpath(targ,parent);
	console.log(path);
}

function minDistance(dist,sptSet)
{
	var min=int_max;
	var min_index;

	for(var i=0;i<v;i++)
	{
		if(sptSet[i]==false&& dist[i]<=min)
			{
				min=dist[i];
				min_index=i;
			}
	}
	return min_index;
}
function djikstra(src,targ)
{
	for(var i=0;i<v;i++)
	{
		parent[i]=-1;
		dist[i]=int_max;
		sptSet[i]=false;
	}
	dist[src]=0;
	for(var count=0;count<v-1;count++)
	{
		var u=minDistance(dist,sptSet);
		sptSet[u]=true;
		for(var j=0;j<v;j++)
		{
			if(!sptSet[j]&&graph[u][j]&&dist[u]!=int_max&&dist[u]+graph[u][j]<dist[j])
			{
				parent[j]=u;
				dist[j]=dist[u]+graph[u][j];
			}
		}
	}

	min_dist=dist[targ];
	printSolution(src,targ);
}

var i=0;
var h=130+(9.1*path.length);
var db=document.getElementById("datablock");
db.style.height=h+"%";
while(i<path.length)
{
	/*sample syntax
	<div style="padding-top:-10px;padding-bottom: -10px">
	<div style="font-family: caviar;color: white;font-size: 120%; margin:2%;height:50px;border:2px solid;border-color: white; border-radius: 5px; background-color:black;">
		<div style="width: 10%;float: left;">
		&nbsp&nbsp<img src="colors/AQUA.png" style="width:40%;height:100%;">
		</div>
		&nbsp&nbsp&nbsp&nbsp<div style="float:left;margin-top: 12px ;"><font style="color:white;"> Kaushambi</font></div>

	</div>
</div>*/
var col=station_details[path[i]][1];
if(0<i&&i<path.length-1)
{
	
	if(station_details[path[i-1]][1]==station_details[path[i+1]][1])
		col=station_details[path[i-1]][1];
	
	/*else
	{
		if(station_details[path[i]][1]!=station_details[path[i+1]][1]&&col==station_details[path[i]][1])
		{
		var change="<font style='color:white;'><br>change line</font>";
		document.write(change);
		}
	}*/
}
var str='<div style="margin-top:-10px;margin-bottom: -10px"><div style="font-family: caviar;color: white;font-size: 120%; margin:2%;height:50px;border:2px solid;border-color: white; border-radius: 5px; background-color:black;">		<div style="width: 10%;float: left;">		&nbsp&nbsp<img src="colors/'+col+'.png" style="width:40%;height:100%;">		</div>		&nbsp&nbsp&nbsp&nbsp<div style="float:left;margin-top: 12px ;"><font style="color:white;">'+station_details[path[i]][0]+'</font></div>';


if(0<i&&i<path.length-2)
{
if((station_details[path[i]][1]!=station_details[path[i+1]][1])&&(station_details[path[i]][1]==station_details[path[i-1]][1])&&station_details[path[i]][1]!=station_details[path[i+2]][1])
		{
				var change=' <div style="float:right;width:35%"><div style="float:left;margin-top: 12px ;"><font style="color:white;"> Change From </font></div>&nbsp&nbsp<img src="colors/'+station_details[path[i]][1]+'.png" style="width:10%;height:100%;">	<div style="width:-10%:height:100% ;float:right;"><img src="colors/'+station_details[path[i+1]][1]+'.png" style="width:20%;height:100%;"></div><div style="float:right;margin-top: 12px ;"><font style="color:white;"> &nbsp&nbspTo&nbsp&nbsp </font></div></div>';
				str=str+change;
	 	}
}
str=str+"</div></div>"
document.write(str);
i++;

}
function money(dist)
{
	if(dist<=2)
        return 10;
    else if(dist>2&&dist<=5)
        return 20;
    else if(dist>5&&dist<=12)
        return 30;
    else if(dist>12&&dist<=21)
        return 40;
    else if(dist>21&&dist<=32)
        return 50;
    else
        return 60;
}
function timetaken(dist)
{
var speed=0.55;
    return Math.ceil(dist/speed);
}

var fare=money(min_dist);
var time=timetaken(min_dist);
var dis="Shortest Path Length : "+min_dist+" KM";
fare="Average Fare : "+fare+" Rs.";
time="Average Time : "+time+ " MIN.";
park_value="Parking : "+park_value;
document.getElementById("shortestdist").innerHTML=dis;
document.getElementById("time").innerHTML=time;
document.getElementById("station_count").innerHTML="No. Of Stations : "+path.length;
document.getElementById("fare").innerHTML=fare;
console.log(pf);
if(pf="parking")
{
	document.getElementById("park_facility").style.display="hidden";
document.getElementById("park_facility").innerHTML=park_value;
}
else
{
	document.getElementById("park_facility").innerHTML="";
	document.getElementById("park_facility").style.display="none";
}
}
</script>
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
</script>

</body>
</html>