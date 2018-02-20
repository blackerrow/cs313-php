<?php
mail("erict.blackham@gmail.com", "test", "Hi, how are you doing?");

$result = mail("erict.blackham@gmail.com", "test", "Hi, how are you doing?");

var_dump($result);
phpinfo();