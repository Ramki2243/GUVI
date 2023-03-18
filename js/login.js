function login(e) {
    $(document).ready(function () {
        console.log("ready");
        var data = {
            email: $('#email').val(),
            password: $('#password').val(),
            action: $('#action').val()
        };
        $.ajax({
            type: 'post',
            url: 'php/login.php',
            data: data,
            success: function (response) {
                
                alert(response);
                console.log("responeded");
                if (response == "login success") {
                    // window.location.replace("/profile.html")
                    alert("login success");
                    e.preventDefault();
                }
            }
        });
    });
}
