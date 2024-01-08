// valiable
var menuToggle = document.getElementById("menu"),
    navlogo = document.getElementById("navlogo"),
    searchBox = document.getElementById("searchBox");


    //SIDEBAR NAVIGATION SESSION HERE.
    function sidebarOpen() {
        menuToggle.style.left="0";
        navlogo.style.display="none";
        searchBox.style.display="none";
      }
      function siderbarClose() {
        menuToggle.style.left="-500px";
        navlogo.style.display="block";
        searchBox.style.display="block";
      }
      function pushIt() {
        jinx.innerHTML=("Online Shopping");
      }