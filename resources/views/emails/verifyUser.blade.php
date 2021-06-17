<!DOCTYPE html>
<html>
<head>
    <title>Email de bienvenue</title>
</head>

<body>
<h3>Bonjour {{$user['name']}}</h3>
<br/>
<p>Bienvenue sur le site Installation Obsolètes.</p>
<p>Votre email enregistré est {{$user['email']}}. <br/>
    Merci de cliquer sur le lien pour vérifier votre email:
    <a href="{{url('user/verify', $user->verifyUser->token)}}">Vérifiez e-maill</a>
</p>
--
<a href="https://www.mountainwilderness.fr/">
    L'équipe Installations Obsolètes / Mountain Wilderness

</a>
</body>

</html>

