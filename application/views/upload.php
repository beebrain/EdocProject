<html>


<head>


</head>

<body>
    <form action="#" style="border:1px solid #ccc" id="fmupload">
        <div class="container">
            <label for="last"><b>select upload file</b></label>
            <input type="file" placeholder="Enter last name" id="fileupload" name="fileupload">
            <button id="upload" type="button" onclick="ajaxUpload()"> upload</button>
        </div>

        <div id="result">before upload </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    function ajaxUpload() {
        $("#result").html("upload process");
        var file_data = $('#fileupload').prop('files')[0];
        console.log($('#fileupload'))
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: "<?php echo base_url()."index.php/Usercontroller/uploadfile/" ?>",
            dataType: 'json', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            uploadProgress: function(e) {
                alert("Uploading");
            },
            data: form_data,
            type: 'post',
            success: function(data) {
                $("#result").html(data["msg"]);
                console.log(data);
            },
            error: function(data) {
                $("#result").html(data["msg"]);
                console.log(data);
            },
            complete: function(data) {
                $("#result").html(data["msg"]);
            }
        });

    }
    </script>
</body>

</html>