<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau mot de passe - Chess Teaching Tool</title>
</head>

<body>
    <h1>Réinitialiser le mot de passe</h1>
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
        <button type="submit">Enregistrer</button>
    </form>
</body>

</html>
