<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

    <title></title>
    <style type="text/css">
	
      #map {
        height: 100%;
      }

      html, body {
        height: 100%;
        margin: 0;
        padding: 0;

      }
	  
	  .opis
	  {
		  width: 230px;
	  }
	  
	  input[type=button] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	width: 100%;
    float: center;
}

input[type=text], select, textarea {
    width: 230px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

	 .upload {
		position: relative;
		overflow: hidden;
		width: 230px;
		padding: 8px;
		text-align: center;
		background: #dd4b4d;
		border-radius: 3px;
	}
	
	 .upload input[type=file] {
		position: absolute;
		top: 0;
		right: 0;
		margin: 0;
		padding: 0;
		width: 230px;
		height: 100%;
		cursor: pointer;
		opacity: 0;
	}
	 .upload label {
		color: #fff;
	}
	 .upload label:before {
		content: "\21EA";
		margin-right: 5px;
	}


	 
    </style>
<link href="editor/lightbox.css" rel="stylesheet">


  </head>
  <body>
    <div id="map" height="460px" width="100%"></div>
	
 
  
    <script>
	

	/*document.write("<div id='form'>");
	document.write(" <table>");
	document.write(" <tr><td>Nazwa:</td> <td><input type='text' id='name'/> </td> </tr>");
	document.write(" <tr><td>E-mail: </td> <td> <input type='text'  id='email'/> </td></tr>");
	document.write(" <tr><td>Opis: </td> <td> <input type='text' class='opis' id='description'/> </td></tr>");
	document.write(" <td> </td><td><INPUT type='file' name='zdjecie'></td></tr>");
	document.write(" <tr><td></td><td><input type='button' value='Save' onclick='saveData()'/></td></tr>");
	document.write(" </table>");
	document.write(" </div>");
	var mapaOpenStreetMap = {
	getTileUrl: function(wspolrzedne, zoom) {
		var znormalizowaneWspolrzedne = normalizujWspolrzedne(wspolrzedne, zoom);
		if (!znormalizowaneWspolrzedne) {
			return null;
		}
		return 'https://tile.openstreetmap.org/'+zoom+'/'+znormalizowaneWspolrzedne.x+'/'+znormalizowaneWspolrzedne.y+'.png';
	},
	//tileSize: new google.maps.Size(256, 256),
	maxZoom: 19,
	name: "OpenStreetMap"
};
*/

      var map;
      var txt;
      var infowindow;
      var messagewindow;
	  var markers = [];
		var i=0;
		var text = ["<form method='get' action='' enctype='multipart/form-data' id='test'>  <table> <tr> Wybierz kategorię: <tr><tr><td><input type='checkbox' class='checkIt' name='nazwa[]' value='1' />Uszkodzenie </td><td><input type='checkbox' name='nazwa[]' class='checkIt' value='2' id='nazwa'/>Inicjatywa <input type='checkbox' class='checkIt' name='nazwa[]' value='3' />Modernizacja </td> </tr><tr><td>Nazwa:</td> <td><input type='text' 	class='opis' id='name'/>	</td> </tr> <tr><td>E-mail: </td> <td> <input type='text'  id='email'/> </td></tr> 		<tr><td>Opis: </td> <td>  ​<textarea id='description'  rows='7' cols='30'>	</textarea></td></tr> <td> </td>		<td><input id='sortpicture' type='file' name='sortpic' > 	</td></tr> <tr><td></td><td><input type='submit' value='Wyślij' id='upload' onclick='saveData()'/></td></tr> </table> </form>"].join('');
	//var text = [" <a href= 'data/marker.png' rel='lightbox'> <img src='data/marker.png' width='150'</img> </a>"].join('');
/*	function normalizujWspolrzedne(wspolrzedne, zoom) {
	var y = wspolrzedne.y;
	var x = wspolrzedne.x;

	var liczbaKawalkow = 1 << zoom;

	// blokada zapetlania w pionie
	if (y < 0 || y >= liczbaKawalkow) {
		return null;
	}

	// zezwolenie na zapetlanie w poziomie
	if (x < 0 || x >= liczbaKawalkow) {
		x = (x % liczbaKawalkow + liczbaKawalkow) % liczbaKawalkow;
	}

	return { x: x, y: y };
}
*/
  
	  function dodajMarker(latlng)
	  {
		  var ico = {
			url: 'marker.png',
			scaledSize: new google.maps.Size(42,42)
		};
		if (!infowindow)
		{
			 infowindow = new google.maps.InfoWindow({
         content: document.getElementById('form')
        });
		}
		
	
		
		    marker = new google.maps.Marker({
            position: latlng,
            map: map,
			icon: ico,
			animation: google.maps.Animation.DROP,
			//content: document.getElementById('form').style.display='block'
			
			
          });
		  
		//var text = " <a href= 'data/marker.png' rel='lightbox[]'> <img src='data/marker.png' width='150' alt='marker.png'</img> </a>";
		
		//var content = "<a href='./gpm/"+pdata+"' rel='lightbox[]' title='"+title+"'><img src='./gpm/"+pdata+"' width='180' alt='"+pdata+"'></a><br><b>Date</b>: "+year+"/"+month+"/"+day+" - "+time;
		if (infowindow) infowindow.close(); 
          infowindow = new google.maps.InfoWindow({content: text});
		  
    infowindow.open(map, marker);
		 infowindow.addListener( 'closeclick', function()
		 {
			
		 });

			
			
          google.maps.event.addListener(marker,'click', function() {
		infowindow.close();
		infowindow = new google.maps.InfoWindow({content: text});
    infowindow.open(map, marker);
		 });
		  markers.push(marker);
		// return marker;
	  }
	  
function wczytajMarker(lat,lng,txt,email,opis,photo)
		{
			// tworzymy marker
			var ico = {
			url: 'https://mapapotrzeb.000webhostapp.com/photos/marker.png',
			scaledSize: new google.maps.Size(42,42)
		};
			var opcjeMarkera =   
			{  
				position: new google.maps.LatLng(lat,lng),  
				map: map,
				icon: ico
				
			}  
			var marker = new google.maps.Marker(opcjeMarkera);
			marker.txt=txt;
			marker.opis=opis;
			marker.email=email;
			marker.photo=photo;
			
			var textout = "Nazwa: "+marker.txt+"  <br> E-mail: " + marker.email + "<br> Opis:  "+ marker.opis + " <br><a href='data/"+marker.photo +"' rel='lightbox[]'> <img src='data/"+marker.photo+"' width='130' </img></a>";

			
		marker.addListener('click',function()
		{
			infowindow.close();
				infowindow = new google.maps.InfoWindow({content: textout});
				infowindow.open(map,marker);
				
			});
			//return marker;
			
		}
		
		function usunMarkery()
			{
				/*for(var i=0; i<markery.length; i++)
				{
					markery[i].setMap(null);
				}*/
				markery = [];
			}
		
		
      function initMap() {
        var wspolrzedne = new google.maps.LatLng(53.409378, 18.422014);
        map = new google.maps.Map(document.getElementById('map'), {
          center: wspolrzedne,
          zoom: 12,
		  minZoom: 12,
		  //mapTypeId: 'plan',
		  //disableDefaultUI: true,
		  styles: [{"featureType": "water","stylers": [ {"hue": "#00ccff"},{"gamma": 0.44},{ "saturation": -133}]},  {"elementType": "geometry","stylers": [{  "hue": "#ff4400"},{"saturation": -68},{"lightness": -4},{ "gamma": 0.72 } ]}]
		 
		  
        });
		//map.mapTypes.set('openstreetmap', new google.maps.ImageMapType(mapaOpenStreetMap));
		//map.setMapTypeId('openstreetmap');
		dodajMarker(null);
		

       

		

        google.maps.event.addListener( map,'click', function(event) {
		//markery[i].setMap(map);
		 if(i>0)
		 {
		markers[i].setMap(null);
		 }
		i++;
		 
		console.log(i);
			 dodajMarker(event.latLng)
		
  });
			
		
		<?php
$db = new mysqli('localhost', 'root', '', 'mapa');
$db -> query("SET CHARSET utf8");
$db -> query("SET NAMES 'UTF-8' COLLATE 'utf8_polish_ci'");
$ile = "SELECT count(*) AS id FROM markers";
$zapytanie = "SELECT * FROM markers INNER JOIN photo ON markers.id = photo.id;";
//$zapytanie = "SELECT * FROM markers;";
$ile1 = $db->query($ile);
$wynik = $db->query($zapytanie);
$ile1 = $db->query($ile);
$wynik = $db->query($zapytanie);
$ilosc = $ile1->fetch_assoc();

$i=$ilosc['id'];
$w=1;
 
	while ($baza = $wynik->fetch_assoc())
 
{ echo("var marker".$w++." = wczytajMarker(".$baza['lat'].",".$baza['lnt'].",'".$baza['name']."','".$baza['email']."','".$baza['description']."','".$baza['photos']."'); "); }

 ?>
      }

	 
      function saveData() {
		  
		$(document).on('submit', function(){
		var data = $('form').serialize();
		$.ajax({
        url: 'checkbox.php',
        data: data,
        processData: false,
        type: 'GET',
        success: function ( data ) {
            alert( "dodano" );
        }
    });
 });
		  
		  
		 
        var name = escape(document.getElementById('name').value);
		 var email = escape(document.getElementById('email').value);
		  var description = escape(document.getElementById('description').value);
        var latlng = marker.getPosition();
       
$(document).on('submit', function(e){
  e.preventDefault();
   var file_data = $('#sortpicture').prop('files')[0];
  var form_data = new FormData($('#sortpicture')[0]);
   form_data.append('file', file_data);
  $.ajax({
      type:'POST',
      url:'dodaj.php',
      processData: false,
      contentType: false,
      async: false,
      cache: false,
      data : form_data, 
      success: function(response){
 
      }
	 
  });


});


 var url = 'phpsqlinfo_addrow.php?name=' + name + '&lat=' + latlng.lat() + '&lng=' + latlng.lng() + '&email=' + email + '&description=' + description;
        downloadUrl(url, function(data, responseCode) {

          if (responseCode == 200 && data.length <= 1) {
             infowindow.close();
		  infowindow.setContent("Dodano do bazy danych");
		infowindow.open(map,marker);
		
		//wczytajMarker(latlng.lat(), latlng.lng(), name,email,description);


          }
        });
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request.responseText, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing () {


      }
	  
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDl1lzzDrkOpuwvxlYpjbJXsWec-zsrQjw&callback=initMap">
    </script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="./editor/jquery.min.js"><\/script>')</script>
<script async src="./editor/lightbox.js"></script>
  </body>
</html>