<?php declare(strict_types=1);

namespace PrinsFrank\SimpleTemplate;

use Laminas\Escaper\Escaper;
use RuntimeException;

readonly class TemplateRenderer {
    public function __construct(
        private Escaper $escaper,
    ) {
    }

    public function render(string $path, object $viewModel): void {
        $t = $this;
        $e = $this->escaper;

        require $path;
    }

    /** @throws RuntimeException */
    public function renderToString(string $path, object $viewModel): string {
        if (!ob_start()) {
            throw new RuntimeException('Unable to start output buffer');
        }

        $this->render($path, $viewModel);
        if (($output = ob_get_clean()) === false) {
            throw new RuntimeException('Failed to get output buffer contents.');
        }

        return $output;
    }
}
