@component('mail::message')
# Bienvenue {{ $user->prenom }} {{ $user->nom }} au monde des Artisanats,
<br>
C'est le plus grand endroit du monde oû vous pouvez vendre, acheter ou juste admirer les produits artisinaux

@component('mail::button', ['url' => $url])
Commencez votre éxperience ici
@endcomponent
<br>
Merci de joindre notre énorme famille,<br>
Artisanat World
@endcomponent
