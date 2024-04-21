<?php

return function() {
  session_unset();
  header("Location: /");
};
