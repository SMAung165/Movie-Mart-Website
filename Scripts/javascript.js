
/* function gofullscreen()
{
	var xx=document.getElementsByClassName("switch1")
	var elem = document.getElementById("fullscreen");
	if(xx[0].checked === true)
	{
		if (elem.requestFullscreen) 
			{		
				elem.requestFullscreen();
			} 
		else if (elem.mozRequestFullScreen) 
			{ 
				elem.mozRequestFullScreen();
			} 	
		else if (elem.webkitRequestFullscreen) 
			{ 
				elem.webkitRequestFullscreen();
			} 	
		else if (elem.msRequestFullscreen) 
			{ 
				elem.msRequestFullscreen();
			}
	}

	else{
		if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
		}
	
} */
/* var elem = document.getElementById("fullscreen");
var xx=document.getElementsByClassName("switch1")
function enablefullscreen()
{
if(xx[0].checked === true)
{
    gofullscreen()
	
}
else
{
    exitFullscreen()
	xx[0].checked=false
}
}
function gofullscreen() 
{
  if (elem.requestFullscreen) {
	  xx[0].checked=true;
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) 
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) 
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) 
    elem.msRequestFullscreen();
  }
}
function exitFullscreen()
{
	if (document.exitFullscreen) {
		xx[0].checked=false;
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
}
$(document).ready(function() {
	gofullscreen()
}); */
function currentSlide(n) {
  showSlides(slideIndex = n);
}

var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("banner");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}


const toggleSwitch = document.querySelector('.switch input[type="checkbox"]');

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
    }    
}

toggleSwitch.addEventListener('change', switchTheme, false);

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); //add this
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light'); //add this
    }    
}
const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}

function toggleNav() 
{
	var x=document.getElementsByClassName("main");
	var z=document.getElementsByClassName("overlaytext");
	var belt=document.getElementsByClassName("containercontainer");
if
(document.getElementById("mySidenav").style.width =="200px")
	{
		document.getElementById("mySidenav").style.width = "0px";
		belt[0].style.marginLeft='0px';
		
		for (var i = 0; i < x.length; i++) 
		{
			x[0].style.marginLeft = "0px";
			x[1].style.marginLeft = "0px";
			x[1].style.transition ="0.5s ease"
		}
	
	}

	else
	{
		document.getElementById("mySidenav").style.width ="200px";
		belt[0].style.marginLeft='200px';
		belt[0].style.transition ="0.5s ease"
		for (var i = 0; i < x.length; i++) 
			{
			x[0].style.marginLeft = "200px";
			x[1].style.marginLeft = "200px";
			x[1].style.transition ="0.5s ease"
			
			}
		
	}
}


var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function toggle()
{
var vid = document.getElementById('bannervideo1');
if (vid.muted==true)
{
	document.getElementById('volume').style.backgroundColor='red'
	vid.muted=false;
}
else {
	vid.muted = true;
	document.getElementById('volume').style.backgroundColor='grey'
	}
}

function slide1()
{
var a='../../videos/banner1.mp4';
var b=document.getElementById('bannervideo1');
var c=document.getElementById('dot1');
var d=document.getElementById('dot2');
var e=document.getElementById('dot3');
var f=document.getElementById('dot4');
var g=document.getElementById('dot5');
	b.src=a;
	c.style.backgroundColor="red";
	d.style.backgroundColor="#d4d3db";
	e.style.backgroundColor="#d4d3db";
	f.style.backgroundColor="#d4d3db";
	g.style.backgroundColor="#d4d3db";
	
}
function slide2()
{
var a='../../videos/banner2.mp4';
var b=document.getElementById('bannervideo1');
var c=document.getElementById('dot1');
var d=document.getElementById('dot2');
var e=document.getElementById('dot3');
var f=document.getElementById('dot4');
var g=document.getElementById('dot5');
	b.src=a;
	c.style.backgroundColor="#d4d3db";
	d.style.backgroundColor="red";
	e.style.backgroundColor="#d4d3db";
	f.style.backgroundColor="#d4d3db";
	g.style.backgroundColor="#d4d3db";
	

}
function slide3()
{
var a='../../videos/banner3.mp4';
var b=document.getElementById('bannervideo1');
var c=document.getElementById('dot1');
var d=document.getElementById('dot2');
var e=document.getElementById('dot3');
var f=document.getElementById('dot4');
var g=document.getElementById('dot5');
	b.src=a;
	c.style.backgroundColor="#d4d3db";
	d.style.backgroundColor="#d4d3db";
	e.style.backgroundColor="red";
	f.style.backgroundColor="#d4d3db";
	g.style.backgroundColor="#d4d3db";
	

}
function slide4()
{
var a='../../videos/banner4.mp4';
var b=document.getElementById('bannervideo1');
var c=document.getElementById('dot1');
var d=document.getElementById('dot2');
var e=document.getElementById('dot3');
var f=document.getElementById('dot4');
var g=document.getElementById('dot5');
	b.src=a;
	c.style.backgroundColor="#d4d3db";
	d.style.backgroundColor="#d4d3db";
	e.style.backgroundColor="#d4d3db";
	f.style.backgroundColor="red";
	g.style.backgroundColor="#d4d3db";
	
	
}
function slide5()
{
var a='../../videos/banner5.mp4';
var b=document.getElementById('bannervideo1');
var c=document.getElementById('dot1');
var d=document.getElementById('dot2');
var e=document.getElementById('dot3');
var f=document.getElementById('dot4');
var g=document.getElementById('dot5');
	b.src=a;
	c.style.backgroundColor="#d4d3db";
	d.style.backgroundColor="#d4d3db";
	e.style.backgroundColor="#d4d3db";
	f.style.backgroundColor="#d4d3db";
	g.style.backgroundColor="red";
	
	
}

function PlayPause() { 
    if (document.getElementById("bannervideo1").paused) {
        document.getElementById("bannervideo1").play();
		document.getElementById("pauselogo").style.display="none";
		document.getElementById("playlogo").style.display="block";
		document.getElementById("playlogo").style.opacity="0";
		document.getElementById("dots").style.zIndex="0";
		document.getElementById("bannervideo1").style.zIndex="0";
        }
    else  {
        document.getElementById("bannervideo1").pause();
		document.getElementById("pauselogo").style.display="block";
		document.getElementById("playlogo").style.display="none";
		document.getElementById("dots").style.zIndex="-2";
		document.getElementById("bannervideo1").style.zIndex="-1";
        }
} 


function showsbox()
{
	var x=document.getElementById("draggable")
	var xy=document.getElementById("night")
	if (x.style.display=="block")
	{
	x.style.display="none"
	x.style.top="-60%"
	x.style.left="0%"
	}
	else
	{
	x.style.display="block"
	}
}

$( function() {
$( "#draggable" ).draggable();
} );

  
 var btncollection =document.getElementsByClassName("overlaybtn");
 var video=document.getElementById('video-div');
 var image=document.getElementById('imagetab');
  btncollection[0].addEventListener("click", function()
  {
  	btncollection[0].classList.remove("active");
  	btncollection[0].className += " active";
  	btncollection[1].classList.remove("active");
  	video.style.display="none"
	image.style.display="block"
  });
  btncollection[1].addEventListener("click", function()
  {
  	btncollection[1].classList.remove("active");
  	btncollection[1].className += " active";
  	btncollection[0].classList.remove("active");
  	image.style.display="none"
	video.style.display="block"
  });


 filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("li");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add filteractive class to the current button (highlight it)
var topicContainer = document.getElementById("mytopicContainer");
var topics = topicContainer.getElementsByClassName("topic");
for (var i = 0; i < topics.length; i++) {
  topics[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("filteractive");
    current[0].className = current[0].className.replace(" filteractive", "");
    this.className += " filteractive";
  });
}

function my_trim_fun(trim_obj)
{
	return trim_obj.replace(/^\s+|\s+$/gm,'');
}


function search() {
    var input, filter, txt1,txt2, i,cardli, content;
    var txtValue1;
    var txtValue2;
    input = document.getElementById("search-txt");
   	content= document.getElementById("maincontent");
   	cardli =content.getElementsByClassName('li');
    filter = my_trim_fun(input.value.toUpperCase());
 	
    for (i = 0; i < cardli.length; i++) {

        txt1 = cardli[i].getElementsByClassName("card")[0].getElementsByTagName('h4')[0];
        txt2 = cardli[i].getElementsByClassName("card")[0].getElementsByClassName('container')[0].getElementsByTagName('p')[2];
        txtValue1 = (txt1.textContent) || (txt1.innerText);
        txtValue2 = (txt2.textContent) || (txt2.innerText);
        // if ((txtValue1.toUpperCase().indexOf(filter) > -1)(txtValue1.toUpperCase().indexOf(filter) > -1))
        if(((txtValue1.toUpperCase().indexOf(filter) >-1 ) || (txtValue2.toUpperCase().indexOf(filter) >-1 )) )
        {
            cardli[i].style.display = "block";
        } 
        else 
        {
            cardli[i].style.display = "none";
        }
    }
}
