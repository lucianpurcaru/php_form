<?php

$subjects = [
  'sujet' => 'Votre sujet',
  'infos' => 'Renseignements',
  'bill' => 'Facture',
  'other' => 'Autres informations',
];
            
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$contact = array_map('trim', $_POST);
    /* echo htmlentities($contact['name']); */

	$errors = [];

	if (empty($contact['name'])) {
        $errors[] = 'Le nom est obligatoire';
    }

	if (empty($contact['email'])) {
        $errors[] = 'L\'email est obligatoire';
	
    }

	if (!filter_var($contact['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Le format d\'email est incorrect';
	}

	if(!key_exists($contact['subject'], $subjects)) {
        $errors[] = 'Le sujet est incorrect';
    }

	if (empty($contact['message'])) {
        $errors[] = 'Le message est obligatoire';
    }
  
    if (empty($errors)) {
      header('Location: thanks.php');
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="form_css.css">
</head>
<body>

<form  action="/thanks.php"  method="post">
<?php if (!empty($errors)) : ?>
						<ul class="error">
							<?php foreach ($errors as $error) : ?>
								<li><?= $error; ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
    <div>
      <label  for="name">Nom :</label>
      <input  type="text"  id="nom"  name="lastname">
    </div>
    <div>
      <label  for="courriel">Courriel :</label>
        <input  type="email"  id="courriel"  name="email">
    </div>
    <div>
        <label for="phonenumber">Téléphone :</label>
        <input type="tel" id="phonenumber" name="phone">
    </div>
    <div>
        <label for="subject">Objet de la demande:</label>
        <select type="text" id="subject" class="field" placeholder="Sujet" name="subject" required>
						<?php foreach ($subjects as $subject => $subjectMessage) : ?>
							<option value="<?= $subject ?>" <?php if (isset($contact['subject']) && $contact['subject'] === $subject) : ?> selected <?php endif; ?>>
								<?= $subjectMessage ?>
							</option>
						<?php endforeach; ?>
					</select>
    </div>
    <div>
      <label  for="message">Message :</label>
      <textarea  id="message"  name="user_message"></textarea>
    </div>
    <div  class="button">
      <button  type="submit">Envoyer votre message</button>
    </div>
  </form>

</body>
</html>