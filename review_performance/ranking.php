<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../Other/style.css"/>
    <?php
        include '../Functions/eventsToHTML.php';
        include '../Functions/eventList.php';
    ?>
<script>
    $(function(){
    $('#event_select_overall_rankings').change(function(){
        let form = document.getElementById('over_ranking_form');
        let form_data = new FormData(form);
        $.ajax({
                url: "../review_performance/overall_ranking_table.php",
                method: 'POST',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(response){
                    $('#overall_ranking_table').html(response);
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
        <div class="inline_flexbox">
            <h1>Overall Rankings</h1>
        </div>
        <div class="inline_flexbox">
            <h4>Select event to view best performances</h4>
        </div>
        <form id='over_ranking_form'>
            <div class="inline_flexbox">
            <select name="event_select_overall_rankings" id="event_select_overall_rankings" class="form-select">
            <option value="" selected hidden disabled>Select Event</option>
            <?php
                eventsToHTML();
            ?>
            </select>                   
            </div>
        </form>
        
        <div class="bottom_button_wrapper inline_flexbox">
            <a href="../review_performance/review.php" class="btn btn-primary">Back</a>
        </div>
    </div>
    <div>
        <div id="overall_ranking_table" class="footer_table inline_flexbox"></div>        
    </div>

</body>
</html>