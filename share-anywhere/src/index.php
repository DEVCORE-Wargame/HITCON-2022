<!DOCTYPE html>
<html lang="en" data-scheme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareAnywhere</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tocas/4.0.4/tocas.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tocas/4.0.4/tocas.min.js"></script>
</head>
<body>  
    <div class="ts-content is-center-aligned is-vertically-very-padded">
        <div class="ts-space"></div>
        <div class="ts-container is-narrow">
            <div class="ts-header is-center-aligned is-huge is-heavy">ShareAnywhere</div>
            <div class="ts-text is-secondary">Share your file from anywhere to anywhere with <b style="color: var(--ts-primary-500);">ONLY</b> curl command!</div>
        </div>
    </div>
    <div class="ts-content is-center-aligned">
        <iframe
            src="https://carbon.now.sh/embed?bg=rgba%28171%2C+184%2C+195%2C+1%29&t=seti&wt=none&l=application%2Fx-sh&width=680&ds=true&dsyoff=20px&dsblur=68px&wc=true&wa=true&pv=56px&ph=56px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=%250A%2523%2520Upload%2520method%25201%250Acurl%2520--upload-file%2520.%252Fhello.txt%2520http%253A%252F%252Fweb.ctf.devcore.tw%253A8989%252F%250A%250A%2523%2520Upload%2520method%25202%250Acurl%2520-F%2520%27file%253D%2540.%252Fhello.txt%27%2520http%253A%252F%252Fweb.ctf.devcore.tw%253A8989%252Fupload.php%250A%250A%250A%2523%2520Download%2520example%2520with%2520curl%250Acurl%2520-O%2520-J%2520%27http%253A%252F%252Fweb.ctf.devcore.tw%253A8989%252Fdownload.php%253Fid%253DEC94762B-6E4E-4667-867F-9C4B48770C1F%27%250A%250A%2523%2520Download%2520example%2520with%2520wget%250Awget%2520--content-disposition%2520%27http%253A%252F%252Fweb.ctf.devcore.tw%253A8989%252Fdownload.php%253Fid%253DEC94762B-6E4E-4667-867F-9C4B48770C1F%27%250A%250A%250A%2523%2520Check%2520your%2520file%250Acat%2520hello.txt%250A%250A%2523%2520Or%2520if%2520filename%2520wasn%27t%2520provided%2520when%2520uploading%250Acat%2520EC94762B-6E4E-4667-867F-9C4B48770C1F.bin%250A"
            style="width: 1024px; height: 579px; border:0; transform: scale(1); overflow:hidden;"
            sandbox="allow-scripts allow-same-origin"
            onload="this.style.width='1011px'">
        </iframe>
    </div>
</body>
</html>