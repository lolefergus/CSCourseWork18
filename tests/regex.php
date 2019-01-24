<?php
if (print preg_match( "[a-zA-Z0-9_%\+-]+(\.[a-zA-Z0-9_%\+-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z]+)+", "fergus.lole@gmail.com")) {
  echo "Valid";
}
else {
  echo "Invalid";
}
?>
