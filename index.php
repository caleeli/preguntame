<html>
    <head>
        <title>Preguntame algo</title>
    </head>
    <body>
        <form>
            <input name="p" style="width: 100%">
        </form>
        <?php
        if(!empty($_GET['p'])) {
            $dom = new DOMDocument();
            $dom->loadHTMLFile('https://twitter.com/hashtag/'.preg_replace('/[^a-z0-9]+/i', '-', $_GET['p']));
            foreach($dom->getElementsByTagName('img') as $img) {
                if($img->hasAttribute('data-aria-label-part')) {
                    $src = $img->getAttribute('src');
                    echo '<img src="'.$src.'" style="width:30%">';
                }
            }
        }
        ?>
    </body>
</html>