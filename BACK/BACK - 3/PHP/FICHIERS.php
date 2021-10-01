<?php
        $lines = file("liens.txt");
        foreach ($lines as $line_num => $line) {
          echo "<a href='" . htmlspecialchars($line) . "'>". htmlspecialchars($line) ."<a/><br/>";
      }
?>

