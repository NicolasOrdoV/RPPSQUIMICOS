<?php

session_destroy();
echo '<script>localStorage.clear();</script>';
echo '<script>window.location = "index.php";</script>';

