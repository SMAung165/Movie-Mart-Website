var topics = document.getElementsByClassName("ep");
for (var i = 0; i < topics.length; i++) {
  topics[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("btnactive");
    current[0].className = current[0].className.replace(" btnactive", "");
    this.className += " btnactive";
  });
}
function togglecollapse()
{
	if (document.getElementById("content").style.height=="200px")
	{
		document.getElementById("content").style.height="0px"
	}
	else
	{
		document.getElementById("content").style.height="200px"
	}
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


