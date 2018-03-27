<?php
  /*
  The mysql2i class is intened to provide seemless cross over when new versions of PHP,
  which no longer have the mysql extension, are installed. This is a temporary stop gap
  measure to allow developers time to update their code to mysqli or PDO::mysql extensions.
  
  The mysql2i class is a drop and go replacement for the PHP mysql extension. It uses a
  mysqli wrapper to handle mysql function calls.
  
  Place the mysql2i.class.php and mysql2i.func.php files in a web accessible folder and
  include the mysql2i.class.php file before any mysql function calls a made, usually from
  within your initialization files.
  
  The mysql2i.class.php file will include the functions file when the mysql extension is
  not found, so this class can be included anytime, even in installations where the mysql
  extension still exists.
  */
  include_once('mysql2i.class.php');
?>
