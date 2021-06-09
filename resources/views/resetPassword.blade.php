<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="CTT est une application d’enseignement d’échecs en temps réel">
    <meta name="keywords" content="Échecs Chess Teaching enseignement coaching vidéo-conférence live">
    <meta name="author" content="Hans Lysander">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ asset('') }}">
    <meta property="og:title" content="Chess Teaching Tool">
    <meta property="og:image" content="{{ asset('/storage/img/screenshot.jpg') }}">
    <meta property="og:description" content="CTT est une application d’enseignement d’échecs en temps réel">
    <meta property="og:site_name" content="Chess Teaching Tool">
    <meta property="og:locale" content="fr">
    <!-- Next tags are optional but recommended -->
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@HansLysander">
    <meta name="twitter:creator" content="@HansLysander">
    <meta name="twitter:url" content="{{ asset('') }}">
    <meta name="twitter:title" content="Chess Teaching Tool">
    <meta name="twitter:description" content="CTT est une application d’enseignement d’échecs en temps réel">
    <meta name="twitter:image" content="{{ asset('/storage/img/screenshot.jpg') }}">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/storage/img/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/storage/img/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/storage/img/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/storage/img/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/storage/img/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/storage/img/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/storage/img/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/storage/img/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/storage/img/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/storage/img/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/storage/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/storage/img/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/storage/img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/storage/img/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#5C0F6B">
    <meta name="msapplication-TileImage" content="{{ asset('/storage/img/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#5C0F6B">

    <title>Nouveau mot de passe - Chess Teaching Tool</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body>
    <header class="header-s">
        <h1 class="header-s__heading">Chess Teaching Tool</h1>
    </header>
    <h1 class="heading">Réinitialiser le mot de passe</h1>
    <form action={{ route('newpassword') }} method="POST">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="exemple@mail.com" value={{ old('email') }}>
        @error('email')
            <p class="error">Cette adresse mail n'est pas valide.</p>
        @enderror
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="****" value={{ old('password') }}>
        @error('password')
            <p class="error">Ce mot de passe n'est pas correct.</p>
        @enderror
        <label for="password_confirmation">Resaisir le mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="****"
               value={{ old('password_confirmation') }}>
        @error('password_confirmation')
            <p class="error">Le mot de passe ne correspond pas.</p>
        @enderror
        <input type="hidden" name="token" value={{ $token }}>
        <button type="submit" class="submit-btn">Enregistrer</button>
    </form>
</body>

</html>
