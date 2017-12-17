<?php
session_start();

session_destroy();

header("location: Access.php?logout=You successfully Logged Out");

?>﻿
