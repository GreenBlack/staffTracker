<?php

function id264($steamID){
     list($e, $type, $id) = split(":", $steamID);
    return ($id * 2) + 76561197960265728 + $type;
}