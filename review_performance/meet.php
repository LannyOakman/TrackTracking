<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Other/style.css"/>
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
                        $('#review_meet_return_text').text('');
                        
                        /*
                            This is really jank. A better way for error handeling?
                        */
                        
                        if(response.startsWith('No')){
                            $('#review_meet_return_text').text(response);
                            return;
                        }
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
    <div class="form_wrapper">
    <div class="header">
        <h1>Review Meet</h1>        
    </div>
    <form id="select_meet_form">
        <div class="inline_flexbox">
        <select name="review_meet_selection" id="review_meet_selection" class="form-select">
        <option value="" selected disabled hidden>Select Meet</option>
        <?php
            listMeet();
        ?>
        </select>
        </div>
    </form>
    <div class="inline_flexbox">
        <a href="../review_performance/review.php" class="btn btn-primary">Back</a>
    </div>
    <div class="return_text">
        <p id='review_meet_return_text'></p>
    </div>
    </div>
    <div id='meet_table' class="footer_table inline_flexbox"></div>
</body>
</html>