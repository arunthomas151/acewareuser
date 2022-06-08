
<!DOCTYPE html>
<html>
<head>
    <title>Upload Resume</title>

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
                <h2>Upload Your Resume</h2><br>
            </div>
            <div class="card">
                <form id="resume" class="resume" enctype="multipart/form-data">
                    @csrf
                    <label for="Resume">Resume :</label>
                    <input type="hidden" name="userid" value="{{ $userid }}">
                    <input type="file" placeholder="Upload Resume" id="resume" name="resume" autocomplete="off"><br>
                    <button type="button" id="uploadbtn" value="Upload">Upload</button>
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
    $('#uploadbtn').on('click', function() {
        var formData = new FormData($('#resume')[0]);
        formData.append("_token", '{{csrf_token()}}');
        $.ajax({
            type: "post",
            url: "http://127.0.0.1:8000/api/uploadresume",
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.status == 200) {
                    toastr.success(res.message);
                    document.getElementById("resume").reset();
                } else {
                    toastr.error(res.message);
                }
            }
        });
    });
</script>