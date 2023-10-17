<?php

  function redirect($page) 
  {
    $url = URLROOT . '/' . $page;
    if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
        header('HTTP/1.1 301 Movido Permanentemente');
        header('Location: ' . $url);
        exit();
    } else {
        echo "URL inválida.";
        exit();
    }
  }





