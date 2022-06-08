
<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/css/admin.css" rel="stylesheet" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h2>Login</h2><br>
            </div>
            <div class="card">
                <form id="login" class="login" enctype="multipart/form-data">
                    @csrf
                    <label for="emai">Email :</label>
                    <input type="text" placeholder="Email" id="email" name="email" autocomplete="off"><br>
                    <label for="password">Password :</label>
                    <input type="password" placeholder="Password" name="password" autocomplete="off"><br>
                    <label for="error" id="error"></label>
                    <button type="button" id="loginbtn" value="Login">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script>
      toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
    $('#loginbtn').on('click', function() {
        var formData = new FormData($('#login')[0]);
        formData.append("_token", '{{csrf_token()}}');
        $.ajax({
            type: "post",
            url: "http://127.0.0.1:8000/api/userauth",
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.status == 200) {
                    $.ajax({
                        url: "{{ route('setsession')}}",
                        data: { userid: res.userid }
                    }); 
                    window.location.href = "{{ route('userhome')}}";
                } else {
                    toastr.error(res.message);
                }
            }
        });
    });
</script>