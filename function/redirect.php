<?php
function Redirects($url){
    echo '<script type="text/javascript">
    window.location = "'.$url.'"
    </script>';
}
?>