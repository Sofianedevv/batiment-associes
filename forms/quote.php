<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Configuration pour l'envoi d'email
  $receiving_email_address = 'sofiane.chadili@hotmail.com';

  // Récupération des données du formulaire
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $message = $_POST['message'] ?? '';

  // Validation basique
  if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    die('Please fill all the fields');
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email format');
  }

  // Préparation du contenu de l'email
  $email_content = "Nouveau message de devis :\n\n";
  $email_content .= "Nom: " . $name . "\n";
  $email_content .= "Email: " . $email . "\n";
  $email_content .= "Téléphone: " . $phone . "\n";
  $email_content .= "Message:\n" . $message . "\n";

  // En-têtes de l'email
  $headers = "From: " . $email . "\r\n";
  $headers .= "Reply-To: " . $email . "\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  // Envoi de l'email
  if (mail($receiving_email_address, "Nouvelle demande de devis", $email_content, $headers)) {
    echo "OK";
  } else {
    echo "Une erreur est survenue lors de l'envoi du message.";
  }
?>
