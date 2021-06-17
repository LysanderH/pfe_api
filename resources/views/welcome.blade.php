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

    <title>Chess Teaching Tool</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body itemscope="" itemtype="https://schema.org/SoftwareApplication">

    <meta itemprop="applicationCategory" content="Communication">
    <meta itemprop="operatingSystem" content="Windows">
    <meta itemprop="operatingSystem" content="MacOs">
    <meta itemprop="softwareVersion" content="1.0.1">
    <meta itemprop="fileSize" content="68,1 MB">


    <header class="header">
        <h1 class="header__heading" itemprop="name">Chess Teaching Tool</h1>
        <p class="header__text">Une application d'échecs pour les cours en ligne.</p>
        <div class="header__downloads">
            <a href="{{ asset('ChessTeachingTool Setup 2.3.0.exe') }}" download="ChessTeachingTool.exe"
               class="header__link header__link--win" itemprop="downloadUrl">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <g>
                            <polygon points="0,80 0,240 224,240 224,52" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <polygon points="256,48 256,240 512,240 512,16" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <polygon points="256,272 256,464 512,496 512,272" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <polygon points="0,272 0,432 224,460 224,272" />
                        </g>
                    </g>
                </svg>
                <span class="download">Télécharger&nbsp;:</span>
                <span class="os">Windows</span>
            </a>
            <a href="{{ asset('ChessTeachingTool-2.3.0.dmg') }}" download="ChessTeachingTool.dmg"
               class="header__link header__link--mac" itemprop="downloadUrl">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 13.802 13.802" style="enable-background:new 0 0 13.802 13.802;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M10.668,7.333c-0.018-1.749,1.426-2.586,1.49-2.628c-0.811-1.185-2.073-1.348-2.524-1.366
   c-1.073-0.11-2.096,0.632-2.642,0.632c-0.544,0-1.386-0.617-2.277-0.601C3.543,3.388,2.464,4.052,1.86,5.1
   c-1.217,2.112-0.312,5.24,0.874,6.955c0.58,0.838,1.272,1.779,2.179,1.746c0.874-0.035,1.204-0.566,2.261-0.566
   s1.354,0.566,2.278,0.549c0.941-0.018,1.536-0.855,2.111-1.695c0.666-0.973,0.94-1.916,0.957-1.963
   C12.498,10.114,10.687,9.421,10.668,7.333z" />
                            <path d="M8.93,2.204C9.411,1.621,9.737,0.809,9.648,0C8.953,0.028,8.114,0.461,7.615,1.045
   C7.168,1.562,6.779,2.387,6.883,3.18C7.657,3.241,8.449,2.786,8.93,2.204z" />
                        </g>
                    </g>
                </svg>
                <span class="download">Télécharger&nbsp;:</span>
                <span class="os">Apple</span>
            </a>
        </div>
    </header>
    <main itemprop="featureList">
        <section class="presentation">
            <h2 class="presentation__heading sro">Présentation</h2>
            <section class="exercises" aria-label="Ajouter des exercices">
                <h3 class="exercises__heading" role="heading" aria-level="3">Ajouter des exercices</h3>
                <p class="exercises__paragraph">Vous pouvez enregistrer des exercices en utilisant un fen ou directement
                    avec un échiquier.</p>
                <img src="{{ asset('storage/img/exercises.jpg') }}" alt="" class="exercises__img" width="400"
                     height="300" proptype="screenshot">
            </section>
            <section class="classes" aria-label="Créer des leçons">
                <h3 class="classes__heading" role="heading" aria-level="3">Créer des leçons</h3>
                <p class="classes__paragraph">Vous pouvez organiser vos exercices en leçons et ajouter des notes.
                    Ensuite vous pouvez les utiliser pour vos cours.</p>
                <img src="{{ asset('storage/img/lessons.jpg') }}" alt="" class="classes__img" width="400"
                     height="300" proptype="screenshot">

            </section>
            <section class="exercises" aria-label="Organiser les étudiants par classes">
                <h3 class="exercises__heading" role="heading" aria-level="3">Organiser les étudiants par classes</h3>
                <p class="exercises__paragraph">Vous pouvez organiser vos étudiants par classes, en ajoutant les
                    étudiants
                    qui ont un compte.</p>
                <img src="{{ asset('storage/img/classes.jpg') }}" alt="" class="exercises__img" width="400"
                     height="300" proptype="screenshot">
            </section>
            <section class="classes" aria-label="Donner des cours en live">
                <h3 class="classes__heading" role="heading" aria-level="3">Donner des cours en live</h3>
                <p class="classes__paragraph">Vous pouvez commencer des vidéos conférences en utilisant les leçons
                    que vous avez préparer.</p>
                <img src="{{ asset('storage/img/video-conference.jpg') }}" alt="" class="classes__img" width="400"
                     height="300" proptype="screenshot">
            </section>
        </section>
    </main>
    <footer class="footer">
        <a href="https://github.com/LysanderH/pfe_electron" class="footer__link" rel="noreferrer noopener"
           target="_blanc"><span
                  class="sro">GitHub</span><svg version="1.1" class="github" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                    <g>
                        <path d="M255.968,5.329C114.624,5.329,0,120.401,0,262.353c0,113.536,73.344,209.856,175.104,243.872
   c12.8,2.368,17.472-5.568,17.472-12.384c0-6.112-0.224-22.272-0.352-43.712c-71.2,15.52-86.24-34.464-86.24-34.464
   c-11.616-29.696-28.416-37.6-28.416-37.6c-23.264-15.936,1.728-15.616,1.728-15.616c25.696,1.824,39.2,26.496,39.2,26.496
   c22.848,39.264,59.936,27.936,74.528,21.344c2.304-16.608,8.928-27.936,16.256-34.368
   c-56.832-6.496-116.608-28.544-116.608-127.008c0-28.064,9.984-51.008,26.368-68.992c-2.656-6.496-11.424-32.64,2.496-68
   c0,0,21.504-6.912,70.4,26.336c20.416-5.696,42.304-8.544,64.096-8.64c21.728,0.128,43.648,2.944,64.096,8.672
   c48.864-33.248,70.336-26.336,70.336-26.336c13.952,35.392,5.184,61.504,2.56,68c16.416,17.984,26.304,40.928,26.304,68.992
   c0,98.72-59.84,120.448-116.864,126.816c9.184,7.936,17.376,23.616,17.376,47.584c0,34.368-0.32,62.08-0.32,70.496
   c0,6.88,4.608,14.88,17.6,12.352C438.72,472.145,512,375.857,512,262.353C512,120.401,397.376,5.329,255.968,5.329z" />
                    </g>
                </g>
            </svg></a>
        <a href="https://www.facebook.com/lysander.hans" class="footer__link" rel="noreferrer noopener"
           target="_blanc"><span
                  class="sro">Facebook</span><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="fb">
                <path
                      d="m512 256c0-141.4-114.6-256-256-256s-256 114.6-256 256 114.6 256 256 256c1.5 0 3 0 4.5-.1v-199.2h-55v-64.1h55v-47.2c0-54.7 33.4-84.5 82.2-84.5 23.4 0 43.5 1.7 49.3 2.5v57.2h-33.6c-26.5 0-31.7 12.6-31.7 31.1v40.8h63.5l-8.3 64.1h-55.2v189.5c107-30.7 185.3-129.2 185.3-246.1z" />
            </svg></a>
    </footer>
    <div class="appart"><a href="/mentions-legales">Mentions légales</a></div>
</body>

</html>
