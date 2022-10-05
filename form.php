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
    <div>
      <label  for="lastname">Nom :</label>
      <input  type="text"  id="nom"  name="lastname">
    </div>
    <div>
      <label  for="firstname">Prenom :</label>
      <input  type="text"  id="nom"  name="firstname">
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
        <SELECT name="subject" id="subject" size="1">
            <OPTION value="">Objet de ma demande</OPTION>
            <OPTION>Souscription</OPTION>
            <OPTION>Renseignements</OPTION>
            <OPTION>Facture</OPTION>
            <OPTION>Assistance</OPTION>
            <OPTION>Autres informations</OPTION>
        </SELECT>
    </div>
    <div>
      <label  for="message">Message :</label>
      <textarea  id="message"  name="user_message"></textarea>
    </div>
    <div  class="button">
      <button  type="submit">Envoyer votre message</button>
    </div>
  </form>

  <?php
  var_dump($_POST);
  ?>
  <?php
  echo $_POST['user_name'];
  ?>

</body>
</html>