<!DOCTYPE html>
<html lang="ja">

<head>
    <title>Index | VG CTLG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="creative-community.space">
    <meta name="description" content="___">

    <meta property="og:title" content="___" />
    <meta property="og:description" content="___" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="___" />
    <meta property="og:site_name" content="creative-community.space" />
    <meta property="og:image" content="https://creative-community.space/org/qr.png" />
    <meta property="og:locale" content="ja_JP" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@NLC_update" />
    <meta name="twitter:image" content="https://creative-community.space/org/qr.png" />

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://creative-community.space/coding/js/tone/jquery.min.js"></script>
    <script src="https://creative-community.space/coding/js/tone/jquery-ui.min.js"></script>
    <script src="https://creative-community.space/coding/js/tone/Tone.min.js"></script>
    <script src="https://creative-community.space/coding/js/tone/StartAudioContext.js"></script>
    <script src="https://creative-community.space/coding/js/mousedragscrollable/scrollable.js"></script>
    <script src="https://creative-community.space/org/searchBox.js"></script>

    <link rel="stylesheet" href="https://creative-community.space/org/index.css" />
    <link rel="stylesheet" href="https://creative-community.space/org/searchBox.css" />
    <link rel="stylesheet" href="index.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <style>
        :root {
            --text-color: #111;
            --text-family: 'Great Vibes', cursive;
            --hover-color: blue;
            --border-style: 1px dashed #111;
            --bg-color: transparent;
            --list-bg: transparent;
            --list-text: #111;
            --list-family: 'Lucida Console', Courier, monospace;
            --org-text: #fff;
            --org-bg: #111;
            --org-border: solid 1px #111;
            --update-text: #eee;
        }
        
        #greeting #text,
        #collection li p b,
        h1,
        h2,
        .collection h2 {
            transform: scale(1, 1.5);
            font-family: var(--text-family);
            font-weight: 500;
        }
        
        #collection li p,
        form,
        .reset-button,
        .collection p,
        #footer {
            transform: scale(1, 1.1);
            font-family: var(--list-family);
        }
        
        #about {
            width: 35rem;
            max-width: 95%;
        }

        #img {
            width: 55rem;
            max-width: 75%;
        }
        
        .mousedragscrollable {
            display: block;
        }

        #bought:checked~label,
        #gift:checked~label,
        #free:checked~label,
        #made:checked~label,
        #collaborations:checked~label,
        #other:checked~label,
        #sale:checked~label {
            text-decoration: double underline;
        }
        
        .mousedragscrollable::-webkit-scrollbar-thumb,
        .mousedragscrollable li::-webkit-scrollbar-thumb {
            background: var(--list-bg);
            border: var(--border-style);
        }
        
        #cover {
            background-image: url("");
            background-position: center;
            background-size: auto 100%;
            background-repeat: no-repeat;
            overflow: hidden;
        }
        
        #images {
            position: absolute;
            top: 40%;
            left: 50%;
            width: 90%;
            height: 0;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            max-width: 100vh;
        }
        
        #images .list_item {
            position: relative;
            padding: 0;
            margin: 2.5vh 0;
        }

        #images li:nth-child(n+26) {
            display: none;
        }
        
        #images img {
            animation: 100s linear infinite spot;
        }

        @keyframes spot {
            0% {
                filter: drop-shadow(1rem 1rem 1rem rgba(50, 50, 50, 0.75));
            }
            25% {
                filter: drop-shadow(1rem -0.5rem 1rem rgba(50, 50, 50, 0.75));
            }
            50% {
                filter: drop-shadow(-1rem -1rem 1.5rem rgba(50, 50, 50, 0.75));
            }
            75% {
                filter: drop-shadow(-0.5rem 2rem 2rem rgba(50, 50, 50, 0.75));
            }
            100% {
                filter: drop-shadow(1rem 1rem 1rem rgba(50, 50, 50, 0.75));
            }
        }

        body,
        ._more:hover,
        header label:hover,
        footer a:hover,
        #greeting p,
        #collection li {
            color: var(--text-color);
        }
        
        ._more,
        header label,
        footer a {
            color: var(--hover-color);
        }
        
        header {
            border-bottom: var(--border-style);
        }
        
        footer {
            border-top: var(--border-style);
        }
        
        ._more:hover,
        header label:hover,
        footer a:hover {
            text-decoration: wavy underline;
            cursor: pointer;
        }
        
        #presents {
            margin: 0.5rem 0;
        }
        
        .collection {
            width: 25rem;
            max-width: 75%;
        }
        
        #footer,
        .change #cover,
        .change #greeting,
        #print {
            display: none;
        }
        
        @media screen and (max-width: 1250px) {
            #images {
                top: 45%;
            }
            #images .list_item {
                margin: 1.75vh 0;
            }
        }
        
        @media screen and (max-width: 750px) {
            #images {
                top: 40%;
            }
            #images .list_item {
                margin: 1.25vh 0;
            }
        }
        
        @media print {
            #images {
                top: 42.5%;
            }
            #images .list_item {
                margin: 2.5vh 0;
            }
            #address,
            #server {
                display: none;
            }
            #footer,
            #print {
                display: block;
            }
            #greeting {
                z-index: -1;
            }
            #greeting p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body id="open">

    <header id="header">
        <nav id="nav">
            <h1>VG CTLG</h1>
            <span id="presents">
                <img src="https://creative-community.space/org/qr.png" width="50rem">
            </span>
            <form>
                <ol class="search-box">
                    <li>Index</li>
                    <li>
                        <input type="radio" name="org" value="bought" id="bought">
                        <label for="bought" class="label">bought</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="gift" id="gift">
                        <label for="gift" class="label">gift</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="free" id="free">
                        <label for="free" class="label">free or found</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="made" id="made">
                        <label for="made" class="label">made</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="collaborations" id="collaborations">
                        <label for="collaborations" class="label">collaborations</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="other" id="other">
                        <label for="other" class="label">other</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="sale" id="sale">
                        <label for="sale" class="label">$$$ FOR SALE $$$</label>
                    </li>
                    <li class="reset">
                        <input type="reset" name="reset" value="View All" class="reset-button label" onclick="greeting()">
                    </li>
                </ol>
            </form>
        </nav>
    </header>

    <main id="main">
        <ul class="mousedragscrollable">
            <li id="about" class="collection"></li>
            <li id="test" class="collection"></li>
        </ul>
    </main>

    <footer id="footer">
        <address id="print">
            <span>
                <?php
                echo $_SERVER['HTTP_HOST'];
                echo $_SERVER['REQUEST_URI'];
                ?>
            </span>
        </address>
    </footer>

    <script type="text/javascript ">
        $('a[href^="# "]').click(function() {
            var href = $(this).attr("href ");
            var target = $(href == "#" || href == " " ? 'html' : href);
            return false;
        });

        $(function() {
            $("#about").load("about.php");
            $("#test").load("test/index.php");
        })
    </script>
</body>

</html>
