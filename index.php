<html>
    <head>
        <title>Preguntame algo</title>
        <style>
            body, html, form {
                width: 100%;
                overflow: hidden;
                margin: 0px;
                padding: 0px;
            }
            .selecciona {
                width: 320px;
                border: 2px solid black;
                border-radius: 16px;
            }
        </style>
    </head>
    <body>
        <form>
            <input name="p" style="width: 100%" placeholder="<?=@$_GET['p']?>" autofocus>
        </form>
        <?php
        if(!empty($_GET['p'])) {
            $dom = new DOMDocument();
            $dom->loadHTMLFile('https://twitter.com/hashtag/'.preg_replace('/[^a-z0-9]+/i', '-', $_GET['p']));
            foreach($dom->getElementsByTagName('img') as $img) {
                if($img->hasAttribute('data-aria-label-part')) {
                    $src = $img->getAttribute('src');
                    echo '<img class="selecciona" src="'.$src.'" >';
                }
            }
        }
        ?>
    </body>
</html>