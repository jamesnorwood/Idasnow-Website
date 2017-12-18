<?php $thisPage="Index"; 
include 'includes/navigation.php';
include 'includes/Dao.php';

$dao = new Dao();
$result = $dao->getResorts();
function display_data($data) {
	
    $output = '<table>';
    foreach($data as $field => $value) {
        $output .= '<tr>';
        foreach($value as $k => $v) {
            if ($field === 0) {
                $output .= '<td><strong>' . $k . '</strong></td>';
            } else {
                $output .= '<td>' . $v . '</td>';
            }
        }
        $output .= '</tr>';
    }
    $output .= '</table>';
    echo $output;
}
//doesn't display correctly right now..
//display_data($result);
?>
<!DOCTYPE html>
<html lang="en">

	<h3><i>--Welcome to Idasnow. A website that helps you find the best skiing
	and snowboarding value in Idaho!--<i></h3>
	
	<p>
	<p> 
	  <i><b>What is a value index?</b></i>
	</p>
	<p>Value index is Idasnow's patent pending formula used to bring you 
	the best snow at the best price... everytime. The secret family recipe is as follows:</p>
	
	$$ValueIndex = {{(BaseDepth * 1.0)} + {(NewSnow * 2.0)}\over Price}$$
<!--	<p>Sort by: 
	  <button onclick="sortTable(8)">Value Index</button>
	  <button onclick="sortTable(3)">New Snow</button>
	</p> -->  
	<!-- Here's my big table!!!--->
	<table id = "resorts">
  <tr>
    <th onclick="sortTable(0)">Resort Name</th>
	<th onclick="sortTable(1)">Base Depth (in.)</th>
    <th onclick="sortTable(3)">New Snow (in.)</th>
    <th onclick="sortTable(4)">Ticket Price ($)</th>
    <th onclick="sortTable(5)">Distance (mi)</th>
	<th onclick="sortTable(6)">Brewery</th>
    <th onclick="sortTable(7)">Resort Open</th>
    <th onclick="sortTable(8)">Value Index</th>
    <th onclick="sortTable(9)">Weather</th>

  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://anthonylakes.com/" target="_blank">
		Anthony Lakes</a></td>
    <td data-th="Base Depth">12</td>
    <td data-th="New Snow">8</td>
    <td data-th="Ticket Price">35</td>
    <td data-th="Distance">154</td>
    <td data-th="Brewery">Barley Browns</td>
    <td data-th="Resort Open">Closed</td>
    <td data-th="Value Index">12.47</td>
    <td data-th="Weather">
	  <img src="/images/icons/cloudy.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://bogusbasin.org/" target="_blank">
	  Bogus Basin</a></td>
    <td data-th="Base Depth">9</td>
    <td data-th="New Snow">0</td>
    <td data-th="Ticket Price">62</td>
    <td data-th="Distance">18</td>
    <td data-th="Brewery">Highlands Hollow Brewery</td>
    <td data-th="Resort Open">Closed</td>
    <td data-th="Value Index">9</td>
    <td data-th="Weather">
	  <img src="/images/icons/sunny.png" style="width:30px;height:30px;">
	</td>	
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://brundage.com/" target="_blank">
	  Brundage</a></td>
    <td data-th="Base Depth">14</td>
    <td data-th="New Snow">0</td>
    <td data-th="Ticket Price">67</td>
    <td data-th="Distance">116</td>
    <td data-th="Brewery">McCall Brewing</td>
    <td data-th="Resort Open">Closed</td>
    <td data-th="Value Index">14</td>
    <td data-th="Weather">
	  <img src="/images/icons/cloudy.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://www.grandtarghee.com/" target="_blank">
	  Grand Targhee</a></td>
    <td data-th="Base Depth">59</td>
    <td data-th="New Snow">6</td>
    <td data-th="Ticket Price">85</td>
    <td data-th="Distance">337</td>
    <td data-th="Brewery">Grand Teton Brewing</td>
    <td data-th="Resort Open">Open</td>
    <td data-th="Value Index">59.14</td>
	<td data-th="Weather">
	  <img src="/images/icons/clouds.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://www.jacksonhole.com/" target="_blank">
	  Jackson Hole</a></td>
    <td data-th="Base Depth">56</td>
    <td data-th="New Snow">8</td>
    <td data-th="Ticket Price">104</td>
    <td data-th="Distance">344</td>
    <td data-th="Brewery">Snake River Brewery</td>
    <td data-th="Resort Open">Open</td>
    <td data-th="Value Index">56.15</td>
	<td data-th="Weather">
	  <img src="/images/icons/snowy.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://www.skikelly.com/" target="_blank">
	  Kelly Canyon</a></td>
    <td data-th="Base Depth">n/a</td>
    <td data-th="New Snow">7</td>
    <td data-th="Ticket Price">42</td>
    <td data-th="Distance">283</td>
    <td data-th="Brewery">Idaho Brewing</td>
    <td data-th="Resort Open">Closed</td>
    <td data-th="Value Index">0.33</td>
	<td data-th="Weather">
	  <img src="/images/icons/sunny.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://skilookout.com/" target="_blank">
	  Lookout Pass</a></td>
    <td data-th="Base Depth">10</td>
    <td data-th="New Snow">0</td>
    <td data-th="Ticket Price">45</td>
    <td data-th="Distance">416</td>
    <td data-th="Brewery">Wallace Brewing</td>
    <td data-th="Resort Open">Open</td>
    <td data-th="Value Index">10</td>
	<td data-th="Weather">
	  <img src="/images/icons/cloudy.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="www.magicmountainresort.com/" target="_blank">
	  Magic Mountain</a></td>
    <td data-th="Base Depth">n/a</td>
    <td data-th="New Snow">n/a</td>
    <td data-th="Ticket Price">32</td>
    <td data-th="Distance">161</td>
    <td data-th="Brewery">Magic Valley Brewing</td>
    <td data-th="Resort Open">Closed</td>
    <td data-th="Value Index">0</td>
	<td data-th="Weather">
	  <img src="/images/icons/clouds.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://pebblecreekskiarea.com/" target="_blank">
	  Pebble Creek</a></td>
    <td data-th="Base Depth">2</td>
    <td data-th="New Snow">0</td>
    <td data-th="Ticket Price">47</td>
    <td data-th="Distance">255</td>
    <td data-th="Brewery">Three Dogs Brewing</td>
    <td data-th="Resort Open">Closed</td>
    <td data-th="Value Index">2</td>
	<td data-th="Weather">
	  <img src="/images/icons/clouds.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="www.pomerelle.com/" target="_blank">
	  Pomerelle</a></td>
    <td data-th="Base Depth">n/a</td>
    <td data-th="New Snow">6</td>
    <td data-th="Ticket Price">45</td>
    <td data-th="Distance">191</td>
    <td data-th="Brewery">Von Scheidt Brewing</td>
    <td data-th="Resort Open">Closed</td>
    <td data-th="Value Index">0.26</td>
	<td data-th="Weather">
	  <img src="/images/icons/cloudy.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://www.schweitzer.com/" target="_blank">
	  Schweitzer</a></td>
    <td data-th="Base Depth">18</td>
    <td data-th="New Snow">0</td>
    <td data-th="Ticket Price">79</td>
    <td data-th="Distance">433</td>
    <td data-th="Brewery">Laughing Dog Brewery</td>
    <td data-th="Resort Open">Open</td>
    <td data-th="Value Index">18</td>
	<td data-th="Weather">
	  <img src="/images/icons/cloudy.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="www.silvermt.com/" target="_blank">
	  Silver Mountain</a></td>
    <td data-th="Base Depth">12</td>
    <td data-th="New Snow">0</td>
    <td data-th="Ticket Price">56</td>
    <td data-th="Distance">392</td>
    <td data-th="Brewery">Radio Brewing</td>
    <td data-th="Resort Open">Partial</td>
    <td data-th="Value Index">12</td>
	<td data-th="Weather">
	  <img src="/images/icons/cloudy.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://www.snowbird.com/" target="_blank">
	  Snowbird</a></td>
    <td data-th="Base Depth">25</td>
    <td data-th="New Snow">17</td>
    <td data-th="Ticket Price">119</td>
    <td data-th="Distance">365</td>
    <td data-th="Brewery">Hoppers Grill and Brewing</td>
    <td data-th="Resort Open">Open</td>
    <td data-th="Value Index">25.28</td>
	<td data-th="Weather">
	  <img src="/images/icons/cloudy.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://soldiermountain.com/" target="_blank">
	  Soldier Mountain</a></td>
    <td data-th="Base Depth">n/a</td>
    <td data-th="New Snow">0</td>
    <td data-th="Ticket Price">43</td>
    <td data-th="Distance">113</td>
    <td data-th="Brewery">Soldier Creek Brewing</td>
    <td data-th="Resort Open">Closed</td>
    <td data-th="Value Index">0</td>
	<td data-th="Weather">
	  <img src="/images/icons/sunny.png" style="width:30px;height:30px;">
	</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="https://www.sunvalley.com/" target="_blank">
	  Sun Valley</a></td>
    <td data-th="Base Depth">23</td>
    <td data-th="New Snow">1</td>
    <td data-th="Ticket Price">71</td>
    <td data-th="Distance">155</td>
    <td data-th="Brewery">Sun Valley Brewing</td>
    <td data-th="Resort Open">Open</td>
    <td data-th="Value Index">23.02</td>
	<td data-th="Weather">
		<img src="/images/icons/sunny.png" style="width:30px;height:30px;">
		</td>
  </tr>
  <tr>
    <td data-th="Resort Name">
	  <a href="http://tamarackidaho.com/" target="_blank">
	  Tamarack</a></td>
    <td data-th="Base Depth">13</td>
    <td data-th="New Snow">2</td>
    <td data-th="Ticket Price">69</td>
    <td data-th="Distance">101</td>
    <td data-th="Brewery">Salmon River Brewery</td>
    <td data-th="Resort Open">Closed</td>
    <td data-th="Value Index">13.05</td>
	<td data-th="Weather">
	  <img src="/images/icons/cloudy.png" style="width:30px;height:30px;">
	</td>
  </tr>
</table>

<script>
$("td:contains('Open')").css("color", "green");
$("td:contains('Closed')").css("color", "red");
$("td:contains('Partial')").css("color", "yellow");
</script>	
	<p>
	</p>
	
	  <!-- The google map with all of the ski resorts will go here.-->
		<div id="map"></div>
		<!-- Replace the value of the key parameter with your own API key. -->
		<script async defer src="https://maps.googleapis.com/maps/api/js?
		key=AIzaSyAzcSmMiI7HF47flluShdavrCQcFh5JjjI
		&callback=initMap">
		</script>
	<p>
	</p>
	
<!--<video autoplay muted loop id="video-background">
	<source src = "images/heavy_snow_in_the_woods.mov" type="video/mov"
</video>-->	
	
	
  </body>
  
  <?php include 'includes/footer.php';?>

</html>
