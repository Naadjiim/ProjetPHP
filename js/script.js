

function connexion() {
    var x = document.getElementById("connexion");
    if (window.getComputedStyle(x).display === "none") {
        x.style.display = "block";
    }
    else{
        x.style.display = "none";
    }
  }

  function inscription() {
    var x = document.getElementById("inscription");
    if (window.getComputedStyle(x).display === "none") {
        x.style.display = "block";
    }
    else{
        x.style.display = "none";
    }
  }


  function console(evt, console) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(console).style.display = "block";
    evt.currentTarget.className += " active";
  }


  
  // Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}