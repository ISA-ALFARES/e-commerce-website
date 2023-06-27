<?php

global $temp;


include  "init.php";

echo '<h1 class="text-center">'. str_replace('-' , '' ,$_GET["pageName"]) .'</h1>';

include $temp."footer.php";
