<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$org = (string)filter_input(INPUT_POST, 'org');
$name = (string)filter_input(INPUT_POST, 'name');
$as = (string)filter_input(INPUT_POST, 'as');
$text = (string)filter_input(INPUT_POST, 'text');
$link = (string)filter_input(INPUT_POST, 'link');

$fp = fopen('people.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$org, $name, $as, $text, $link]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .org {
            position: relative;
        }

        .org h2 {
            padding: 1rem 1rem 0.25rem;
        }

        .org p {
            font-size: 0.75rem;
            margin: 0;
            padding: 1rem;
            font-weight: 500;
            color: var(--list-text);
            display: block;
            transform: scale(1, 1.25);
            transition:all .5s;
        }

        .org:hover p {
            color: var(--update-text);
        }
        
        .org p b {
            font-size: 150%;
            display: inline-block;
        }
        
        .org p u {
            float: right;
            font-size: 75%;
            margin: 0;
            padding: 0.125rem 0.25rem;
            text-decoration: none;
            color: var(--org-text);
            background: var(--org-bg);
            border: var(--org-border);
            border-radius: 0.25rem;
            display: block;
        }
        
        .org .update {
            color: var(--update-text);
            padding: 0.25rem 1rem 1.25rem;
        }
        .org a {
            position:absolute;
            border-bottom:dotted 1px #fff;
            top:0;
            left:0;
            width:100%;
            height:100%;
            transition:all .2s;
        }
        #people a:hover {
            border-bottom: var(--border-style);
        }
    </style>
</head>

<body>
    <ol class="org">
        <h2>People</h2>
        <p class="update cc_style">
        Last Modified : 
            <?php
            $mod = filemtime('people.csv');
            date_default_timezone_set('Asia/Tokyo');
            print "".date("r",$mod);
            ?>
        </p>
        <?php if (!empty($rows)): ?>
        <?php foreach ($rows as $row): ?>
        <li class="list_item list_toggle" data-org="<?=h($row[0])?>">
            <p>
                <u><?=h($row[2])?></u>
                <b><?=h($row[1])?></b>
            </p>
            <p><?=h($row[3])?></p>
            <a href="<?=h($row[4])?>"></a>
        </li>
        <?php endforeach; ?>
        <?php else: ?>
        <li class="list_item list_toggle" data-org="test">
            <p>
                <u>As</u>
                <b>Name</b>
            </p>
            <p>Text</p>
            <a href="#"></a>
        </li>
        <?php endif; ?>
    </ol>

    <script type="text/javascript ">
        var volume;
        var synth;
        var notes;

        $(document).ready(function(event) {
            // StartAudioContext(Tone.context, window);  
            $(window).click(function() {
                Tone.context.resume();
            });

            volume = new Tone.Volume(-20);
            synth = new Tone.PolySynth(10, Tone.Synth).chain(volume, Tone.Master);
            notes = Tone.Frequency("E6").harmonize([12, 14, 16, 19, 21, 24]);
        });

        $(".list_toggle").hover(function() {
            let randNote = Math.floor(Math.random() * notes.length);
            synth.triggerAttackRelease(notes[randNote], "6n");
        });
    </script>
</body>

</html>