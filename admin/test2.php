<?php
$fh = fopen('test.html', 'a');
fwrite($fh, '<h1>Hello world!</h1>');
fclose($fh);
echo "deleted";

unlink('../images/flowers/Flowers-Name-560440963.jpg');
?>