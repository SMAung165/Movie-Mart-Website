<?php require '../../init.php';?>

<html>
<link rel="stylesheet" href="aboutus.css">
<link rel="stylesheet" href="../../css/style0.css">
<link rel="stylesheet" href="../../css/style1.css">
<link rel="stylesheet" href="../../css/GC.css">
<script type="text/javascript" src="../../Scripts/javascript.js"></script>
<body>
<div align="center"\\ id="mySidenav" class="sidenav">
<a href="Microanime.php?#"><text class="changecolor">H</text>ome</a>
<!-- <button id="togglePipButton">Toggle Picture-in-Picture Mode!</button>  -->
<a href="List.php"><text class="changecolor">B</text>rowse</a>
<a href="#" onclick="showsbox()"><text class="changecolor">S</text>earch</a>
<a href="aboutus.php"><text class="changecolor">A</text>bout</a>
<a href="../ContactFrom/index.php"><text class="changecolor">C</text>ontact</a>
</div>
<div style="position:absolute"id="main">
<div class="header">
<a class="none" href="#"><span onclick="toggleNav()"><div class="container1"onclick="myFunction(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div></a>
  <div class="header-right">
    <a class="signin" href="#" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-user"></i></i></a>
    <a class="sharebtn" href="soe12345678.smas@gmail.com"><i class="fas fa-share-alt"></i></a>
  </div>
</div> 
</div>
<div class="about-section">
<link rel="stylesheet" href="aboutus.css">
<link rel="stylesheet" href="../../css/style0.css">
<link rel="stylesheet" href="../../css/GC.css">
  <h1 style="font-family:'Good Times';"><text Class="changecolor">About</text> Us</h1>
  <p>Team THAT Develop Movie Mart Website.</p>
  <p>We deevelop this website as a project for php class</p>
</div>
<div style="position:relative">
<h2 style="text-align:center;font-family:'Good Times';color:Grey;">Our Team</h2>
  <div class="column">
    <a href='https://www.facebook.com/profile.php?id=100014210319488' target="_newtab"><div class="card">
      <img src="../../css/imgs/Profile Pic.jpg" alt="SMA" style="width:100%">
      <div align="center" class="container">
        <h2 Style="font-family:'Libel Suit'">Soe Moe Aung</h2>
        <p Style="font-family:'Libel Suit'" class="title">Developer</p>
        <p Style="font-family:'Libel Suit'">Developer of Movie Mart Website.</p>
        <p Style="font-family:'Libel Suit'">soe12345678.smas@gmail.com</p>
        
      </div>
    </div>
	</a>
  </div>

  <div class="column">
   <a href='https://www.facebook.com/htoo.lelmoo.1240' target="_newtab"> <div class="card" >
      <img src="../../css/imgs/Profile Pic.jpg" alt="HLM" style="width:100%">
      <div  align="center" class="container">
        <h2 Style="font-family:'Libel Suit'">Htoo Lel Moo</h2>
        <p Style="font-family:'Libel Suit'" class="title">Developer</p>
        <p Style="font-family:'Libel Suit'">Developer of Movie Mart Website</p>
        <p Style="font-family:'Libel Suit'">HLM@gmail.com</p>
        
      </div>
    </div></a>
  </div>
</div>
</div>
<div style="position:absolute;bottom:-100%;width:100%;background-color:#262525">
<div style="float:left;position:absolute;top:10px;left:10px;font-family:'Good Times';color:#d4d3db;">Movie <text class="changecolor">Mart</text></div>
<div><a class="footer-text" href="aboutus.php"><div class="footer" align="center">This Page(HTML) was designed by S.M.A</div></a></div>
</div>
</body>
</html>