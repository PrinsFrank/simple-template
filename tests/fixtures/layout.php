<?php declare(strict_types=1);
assert(isset($e) && $e instanceof \Laminas\Escaper\Escaper);
assert(isset($viewModel) && $viewModel instanceof \PrinsFrank\SimpleTemplate\Tests\fixtures\ViewModel);
?>
<html>
    <head>
        <title><?= $e->escapeHtml($viewModel->title) ?></title>
    </head>
    <body>
<?php foreach ($viewModel->items as $key => $item) { ?>
        <a href="<?= $e->escapeHtmlAttr($key) ?>"><?= $e->escapeHtml($item) ?></a>
<?php } ?>
    </body>
</html>
