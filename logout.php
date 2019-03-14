<?php
session_start();
session_destroy();
header('Location: https://subty.ru/index.php');
exit();
