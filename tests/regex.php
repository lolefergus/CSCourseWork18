<?php
$email = "ferguslole@online.sch.im";
if (preg_match( "[a-zA-Z0-9_%\+-]+(\.[a-zA-Z0-9_%\+-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z]+)+", $email)) {
  echo "Valid";
}
else {
  echo "Invalid";
}
?>
