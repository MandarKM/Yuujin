<?php
session_start();
echo'Logging out of account';

session_destroy();
header('Location: /yuujin');
