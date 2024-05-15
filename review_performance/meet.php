<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Registration/styles.css"/>
    <?php
        include '../Functions/listMeet.php';
    ?>
    <script>
    $(function(){
        $('#review_meet_selection').change(function(){
            let form = document.getElementById('select_meet_form');
            let form_data = new FormData(form);
            $.ajax({
                    url: "../review_performance/meet_data.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('#meet_table').html(response);
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                }
            });
        });
    });
    </script>
</head>
<body>
    <h1>Review Meet</h1>
    <label for="review_meet_selection">Select Meet: </label>
    <form id="select_meet_form">
        <select name="review_meet_selection" id="review_meet_selection">
        <option value="" selected disabled hidden>Select Meet</option>
        <?php
            listMeet();
        ?>
    </select>
    </form>
    <p id='outstring'></p>
    <div id='meet_table'></div>
    <table style="border-collapse: collapse;"></table>
    <a href="../review_performance/review.php">
        <button>Back</button>
    </a>

</body>
</html>