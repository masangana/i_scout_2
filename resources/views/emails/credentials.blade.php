<x-mail::message>
# Identifiants


Salut {{$user->name}}! <br>
Un compte a été créé pour vous comme Administrateur sur la plate-forme I-Scout.
Veuillez trouver ci-dessous vos identifiants de connexion.
Une équipe va vous accompagner pour la prise en main.

Login : {{$user->email}} <br>
Mot de passe : {{$password}}



<x-mail::button :url="'http://127.0.0.1:8000'">
Connexion
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
Toujours Prets.
</x-mail::message>
