<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NOB HUB</title>
    <!-- Font Awesome -->
  
    <!-- Bootstrap core CSS -->
    <!--link href="css/bootstrap.min.css" rel="stylesheet"-->
    <!-- Material Design Bootstrap -->
    <!--link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!-- Bootstrap core CSS -->
    <link href="https://mdbootstrap.com/previews/docs/latest/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="https://mdbootstrap.com/previews/docs/latest/css/mdb.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet"><link href="https://nobhub.com/services/cardstyles.css" rel="stylesheet">
	<!--link rel='stylesheet' href='css/addSlider.css' /-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 <link rel = "stylesheet" 
         href = "https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
		 
   <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">	

	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">

	 
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDEc6y2PP50c3529HoVRWY5wru5wLE_6hY"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="cordova.js"></script>
<script type="text/javascript" charset="utf-8">
		function onLoad() {
			document.addEventListener("deviceready", onDeviceReady, false);
			document.addEventListener("deviceready", geoLocation, false);
		}
		function geoLocation() {
			function onSuccess(position) {
				var lat = position.coords.latitude;
				var lng = position.coords.longitude;
				localStorage.setItem("clati",lat);
				localStorage.setItem("clongi",lng);
			}
			function onError(error) {
			
				alert('code: '    + error.code    + '\n' +
					  'message: ' + error.message + '\n');
			}
			navigator.geolocation.getCurrentPosition(onSuccess, onError);
		}
		function onDeviceReady() {
			document.getElementById('custommsg').value=localStorage.getItem("myname")+" would like to connect with you.";
			document.addEventListener("backbutton", onBackKeyDown, false);
		}
		function onBackKeyDown() {
			if(document.getElementById('confirmertoggle').value==1) {
				$("#confirmer").slideUp();
				document.getElementById('confirmertoggle').value=0;
			}
			else {
			location.href="home.html";
			}
		}
	</script>
	
	<script>
		function getprofiles() {
			document.getElementById('loader').style.display="block";
			var user_id = localStorage.getItem("user_id");
			var lati = localStorage.getItem("clati");
			var longi = localStorage.getItem("clongi");
			
		
			//alert(lati);
			//alert(longi);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var result = this.responseText;
					//console.log(result);
					document.getElementById('profiles').innerHTML=result;
					//document.getElementById('minv').value=minv;
					//document.getElementById('maxv').value=maxv;
					document.getElementById('loader').style.display="none";
                }
			};
			xmlhttp.open("GET", "https://nobhub.com/services/getprofiles.php?lati="+lati+"&longi="+longi+"&user_id="+user_id, true); 
			xmlhttp.send();
		}
	</script>
	
	
	<script>
		function searchfn() {
			document.getElementById('loader').style.display="block";
			var key = document.getElementById('searchkey').value;
			var user_id = localStorage.getItem("user_id");
			var lati = localStorage.getItem("clati");
			var longi = localStorage.getItem("clongi");
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var result = this.responseText;
					//console.log(result);
					document.getElementById('profiles').innerHTML=result;
					document.getElementById('clearinput').style.display="block";

					if(document.getElementById('searchkey').value=="") {
					document.getElementById('clearinput').style.display="none";

						getprofiles();
					}
					document.getElementById('loader').style.display="none";
                }
			};
			xmlhttp.open("GET", "https://nobhub.com/services/getprofilessearch.php?lati="+lati+"&longi="+longi+"&user_id="+user_id+"&key="+key, true);
			xmlhttp.send();
		}
		
		
		function searchadvprofile() {
			document.getElementById('loader').style.display="block";
			var key = document.getElementById('searchkey').value;

			var address = document.getElementById('address').value;
			var profession = document.getElementById('profession').value;
			var companyname = document.getElementById('companyname').value;
			var user_id = localStorage.getItem("user_id");
			var lati = localStorage.getItem("clati");
			var longi = localStorage.getItem("clongi");
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var result = this.responseText;
					//console.log(result);
					document.getElementById('profiles').innerHTML=result;
							  $('#adv-search-close-btn').click();
           document.getElementById('searchkey').value ='';

			document.getElementById('address').value = '';
			document.getElementById('profession').value = '';
			document.getElementById('companyname').value = '';
					if(document.getElementById('profiles').innerHTML=="") {
						getprofiles();
					}
					document.getElementById('loader').style.display="none";
                }
			};
			xmlhttp.open("GET", "https://nobhub.com/services/advancedprofilessearch.php?lati="+lati+"&longi="+longi+"&user_id="+user_id+"&address="+address+"&profession="+profession+"&companyname="+companyname+"&key="+key, true);
			xmlhttp.send();
		}
	</script>
	
	<script>
		function sendinvite() {
			if(document.getElementById('idholder').value=="") {
				document.getElementById('confirmtext').innerHTML="Please select atleast 1 Member";
				$("#confirmer").slideDown();
				document.getElementById('confirmertoggle').value=1;
			}
			else {
				$('#myModal').modal('show');
			}
		}
	</script>
	
	<script>
		function sendinvite1() {
			if(document.getElementById('custommsg').value=="") {
				document.getElementById('confirmtext').innerHTML="Please add a message";
				$("#confirmer").slideDown();
				document.getElementById('confirmertoggle').value=1;
			}
			else {
				document.getElementById('loader').style.display="block";
				var user_id = localStorage.getItem("user_id");
				var mids = document.getElementById('idholder').value;
				var custommsg = document.getElementById('custommsg').value;
				var timezone = localStorage.getItem("timezone");

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var result = this.responseText;
						document.getElementById('loader').style.display="none";
						document.getElementById('confirmtext').innerHTML=result;
						//$("#confirmer").slideDown();
						document.getElementById('confirmertoggle').value=1;
						location.reload();
					}
				};
				xmlhttp.open("GET", "https://nobhub.com/services/sendinvite.php?user_id="+user_id+"&mids="+mids+"&custommsg="+custommsg+"&timezone="+timezone, true);
				xmlhttp.send();
			}
		}
	</script>
	
	<script>
		function cons(clickid) {
		
			if(document.getElementById(clickid).style.background=="rgb(255, 255, 255)") {
				document.getElementById('idholder').value=document.getElementById('idholder').value+clickid+",";
				document.getElementById(clickid).style.background="#e9e9e9";
				
				selectedprofiles();
				
			}
			else if(document.getElementById(clickid).style.background=="rgb(233, 233, 233)") {
				var a = document.getElementById('idholder').value;
				var b = a.replace(clickid+",","");
				document.getElementById('idholder').value=b;
				document.getElementById(clickid).style.background="#FFFFFF";
				
				selectedprofiles();
				
			}
		}
		
		
		function selectedprofiles() {
			var user_id = localStorage.getItem("user_id");
			var lati = localStorage.getItem("clati");
			var longi = localStorage.getItem("clongi");
			var mids = document.getElementById('idholder').value;
		
			//alert(lati);
			//alert(longi);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var result = this.responseText;
					//console.log(result);
					document.getElementById('selectedprofiles').innerHTML=result;
					//document.getElementById('minv').value=minv;
					//document.getElementById('maxv').value=maxv;
                }
			};
			xmlhttp.open("GET", "https://nobhub.com/services/selectedprofiles.php?lati="+lati+"&longi="+longi+"&user_id="+user_id+"&mids="+mids, true); 
			xmlhttp.send();
		}
	</script>
	
	<script>
		function thclick(clickid) {
			document.getElementById('confirmtext').innerHTML=clickid;
			$("#confirmer").slideDown();
			document.getElementById('confirmertoggle').value=1;
		}
	</script>
	
	<script>
		$(document).ready(function(){
			$("#okbtn").click(function(){
				$("#confirmer").slideUp();
				document.getElementById('confirmertoggle').value=0;
			});
		});
	</script>
	
<script>
		function alertcount() {
				var user_id = localStorage.getItem("user_id");
				var timezone = localStorage.getItem("timezone");
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var result = this.responseText;
						var splitter = result.split("&");

					
						
						if(splitter[1] > 0){
						document.getElementById('chatcount').innerHTML='<span class="mdl-badge" data-badge="'+splitter[1]+'"></span><i class="fas fa-comments"></i><span><br>Chats</span>';
						}else{
						
						document.getElementById('chatcount').innerHTML='<span class="mdl-badge"></span><i class="fas fa-comments"></i><span><br>Chats</span>';
						}
						if(splitter[2] > 0){
						document.getElementById('meetingscount').innerHTML='<span class="mdl-badge" data-badge="'+splitter[2]+'"></span><i class="fas fa-users"></i><span><br>Meetings</span>';
						}else{
						document.getElementById('meetingscount').innerHTML='<span class="mdl-badge" ></span><i class="fas fa-users"></i><span><br>Meetings</span>';
						
						}
						
					}
				};
				xmlhttp.open("GET", "https://nobhub.com/services/alertcount.php?user_id="+user_id+"&timezone="+timezone, true);
				xmlhttp.send();
			}
			
			function clearinput() {

			document.getElementById('searchkey').value= '';
			document.getElementById('clearinput').style.display="none";

			getprofiles();
		}
		
		function openchat(chatid) {

			localStorage.setItem("chatid",chatid);
			location.href="chat.html";
		}
</script>
<script>
function getprofession() {
			
			document.getElementById('loader').style.display="block";
			//alert(user_id);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var result = this.responseText;
						//alert(profession);
					document.getElementById('profession').innerHTML=result;

			document.getElementById('loader').style.display="none";

                }
			};
			xmlhttp.open("GET", "https://nobhub.com/services/profession.php", true);
			xmlhttp.send();
			}
			
google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('address'),{ types: ['(cities)'] });
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
	
                         var address = place.formatted_address;
         //console.log(place.address_components); // a result has multiple address components

				 for(var i = 0; i < place.address_components.length; i += 1) {
  var addressObj = place.address_components[i];
  for(var j = 0; j < addressObj.types.length; j += 1) {
 //console.log(addressObj.types);
    if (addressObj.types[j] === 'country') {
      //console.log(addressObj.types[j]); // confirm that this is 'country'
     // console.log(addressObj.long_name); // confirm that this is the country name
	  document.getElementById('countryname').value=addressObj.long_name;

    }
  }
}
				
            });
        });			
</script>
<script>
	
	/*window.setInterval(function(){
	alertcount();
	}, 10000);*/
</script>
	
<style>

.ui-rangeslider .ui-rangeslider-sliders {
    margin-left: 86px;
    margin-right: 86px;
}
</style>	
<script src="https://nobhub.com/services/custom-scripts.js"></script></head>

<body class="fixed-sn light-blue-skin" onload="onLoad(); getprofiles(); getprofession();alertcount();">
<div data-role="page" id="page1">
    <div data-role="header">
         <h1>jQuery Mobile Example</h1>
    </div>
    <div role="main" class="ui-content">
        <div data-role="rangeslider">
            <label for="range-1a">Rangeslider:</label>
            <input name="range-1a" id="range-1a" min="0" max="100" value="0" type="range" />
            <label for="range-1b">Rangeslider:</label>
            <input name="range-1b" id="range-1b" min="0" max="100" value="100" type="range" />
        </div>
    </div>
</div>

    <script type="text/javascript" src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
	<!-- Card -->
                      
    <!--/Form with header-->

            
    
    <!--Main Layout-->

    <!-- /Start your project here-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://mdbootstrap.com/previews/docs/latest/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://mdbootstrap.com/previews/docs/latest/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://mdbootstrap.com/previews/docs/latest/js/mdb.min.js"></script>
	
	<!--script src='js/jquery.js'></script-->
	<script src='js/Obj.min.js'></script>
	<!--script src='js/addSlider.js'></script-->


	<script>
        $(".button-collapse").sideNav();
    </script>
	
	
	<script>
		$(document).ready(function(){
		  $('.new-chat-search-btn').click(function(){
			$('#select-contact-div').fadeOut('slow');
			$('#search-contact-div').fadeIn(1000);
		  });
		  $('.back-select-contact').click(function(){
			$('#search-contact-div').fadeOut('slow');
			$('#select-contact-div').fadeIn(1000);
			clearinput();
		  });
		});
		
		$(document).ready(function(){
		  $('#adv-search-btn').click(function(){
			$('.adv-search-btn-div').hide('slow');
			$('.adv-search-div').slideDown(200);
		  });
		  $('#adv-search-close-btn').click(function(){
			$('.adv-search-div').hide('slow');
			$('.adv-search-btn-div').slideDown(200);
		  });
		});
	</script>