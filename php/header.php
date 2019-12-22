 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FainelBoot</title>

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- <link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="css/animate.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();

    </script>
    <script>
     $(document).ready(function(){
        var result;
        $("#symptom_submit").click(function(){
            var formData = $('#symptom_form').serializeArray();
            $.ajax({
            type: "post",
            url: "php/display_doctor_list.php",
            data: formData,
            success: function(result) {
               $("#display_doctor_list").html(result);
            },
           
        });
           
        });
       }); 
    </script>
    