<?php declare(strict_types=1);

namespace PrinsFrank\SimpleTemplate;

use Laminas\Escaper\Escaper;
use RuntimeException;

class TemplateRenderer {
    public function __construct(
        private readonly Escaper $escaper,
    ) {
    }

    public function render(string $path, object $viewModel): void {
        $t = $this;
        $e = $this->escaper;

        require $path;
    }

    /** @throws RuntimeException */
    public function renderToString(string $path, object $viewModel): string {
        ob_start();
        $this->render($path, $viewModel);

        $output = ob_get_clean();
        if ($output === false) {
            throw new RuntimeException('Failed to get output buffer contents.');
        }

        return $output;
    }
}
