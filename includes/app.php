<?php

require "funciones.php";
require "config/database.php";
require __DIR__ . "/../vendor/autoload.php";

$db = conectarBD();

use Model\ActiveRecord;

ActiveRecord::setDB($db);
