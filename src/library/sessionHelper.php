<?php
function destroySession()
{
    session_destroy();
    header('Location: ./index.php');
}

function sessionTime()
{
    set_time_limit(15);
    header('Location: ../dashboard.php');
}