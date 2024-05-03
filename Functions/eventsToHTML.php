<?php
    function eventsToHTML($event_type){
        if (empty($event_type)) return("");

        if (str_ends_with($event_type, "m")){
            return(
                "<label for='$event_type'>$event_type: </label>
                <input type='text' name='$event_type' id='$event_type' placeholder='xx:xx.xxx minutes'>"
            );
        } else{
            return(
                "<label for='$event_type'>$event_type: </label>
                <input type='text' name='$event_type' id='$event_type' placeholder='xx.xx meters'>"
            );
        }
    }
?>