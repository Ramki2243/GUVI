function isloded() {
    
    $.ajax({
        type: "POST",
        url: "php/profile.php",
        datatype: "json",
        success: function (response) {
            var jaso = JSON.parse(response);
            document.getElementById("name").innerHTML = jaso["name"];
            document.getElementById("gender").innerHTML = jaso["gender"];
            document.getElementById("age").innerHTML = jaso["age"];
            document.getElementById("email").innerHTML = jaso["email"];
            document.getElementById("dob").innerHTML = jaso["dob"];
            document.getElementById("username").innerHTML = jaso["username"];
            document.getElementById("contact").innerHTML = jaso["contact"];
            window.location.replace("localhost/GUVI - project/profile.html");
        }
    })
}