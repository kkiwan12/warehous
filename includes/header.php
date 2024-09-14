<?php 
include 'config/function.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Taekwondo</title>
      <link rel="icon" href="assets/uploads/icons/kiwan.png" sizes="16x16"  type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet" />
       <link href="https://cdn.datatables.net/2.0.8/js/dataTables.js"/>
       <link href="assets/css/custom.css" rel="stylesheet" />
       <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-overlay/bsb-overlay.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/background/background.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/margin/margin.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/padding/padding.css">
 
        <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
  <script>
        function setLanguage(lang) {
            document.cookie = "lang=" + lang + "; path=/";
            location.reload();
        }
    </script>
    <?php if(isset($_COOKIE['lang'])){
    $_SESSION['lang'] = $_COOKIE['lang'];

}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}
$langCode = $_SESSION['lang'];
?>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>