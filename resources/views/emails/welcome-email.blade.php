@component('mail::message')
# Welcome {{ $user->prenom }} {{ $user->nom }} to HandArt World,
<br>
We are the biggest area in the world where you can sell, buy or just admire our artisanal products.

@component('mail::button', ['url' => $url])
Start your experience here
@endcomponent
<br>
Thank you for joining our huge family,<br>
HandArt World
@endcomponent
