$(document).ready(function(){
    setInterval(function() {
        $("#show-contacts").load("home.php #show-contacts");
    }, 3500);
});