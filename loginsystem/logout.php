<?php
session_start();
// Destroy session
if (session_destroy()) {
  // Redirecting To  Page
  header("Location: ./../index.php");
}
