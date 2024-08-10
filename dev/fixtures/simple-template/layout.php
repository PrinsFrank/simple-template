<?php declare(strict_types=1);
    assert(isset($e) && $e instanceof \Laminas\Escaper\Escaper);
    assert(isset($title) && is_string($title));
    assert(isset($items) && is_array($items));
?>
<html>
    <head>
        <title><?= $e->escapeHtml($title) ?></title>
    </head>
    <body>
<?php foreach ($items as $key => $item) { ?>
        <a href="<?= $e->escapeHtmlAttr($key) ?>"><?= $e->escapeHtml($item) ?></a>
<?php } ?>
    </body>
</html>
