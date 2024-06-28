<?php
session_start();
if (!$_SESSION['is_login']) {
      header("location:login.php");
}
?>
<head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Women Safety Legal Advisor</title>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="/legal_advisor/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="/legal_advisor/css/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="/legal_advisor/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="/legal_advisor/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="/legal_advisor/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="/legal_advisor/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="/legal_advisor/css/custom.css" />
</head>