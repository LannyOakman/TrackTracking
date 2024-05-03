<?php
    function cleanData($unclean_data) {
        if (gettype($unclean_data) == 'string'){
            $unclean_data = strtolower(trim($unclean_data));
        }
        elseif (gettype($unclean_data) == 'integer'){
            
        }
        return $unclean_data;
    }
?>
