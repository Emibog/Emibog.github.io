<?php 
  mail('eminov.bogdan@mail.ru', 'Сообщение по поводу заказа сайта.', $_POST["text"], 'From:'.$_POST["email"]);
  echo '<meta http-equiv="Refresh" content=" 0 ; URL = http://ginvaellaest.ru/done_form.html">';
 ?>