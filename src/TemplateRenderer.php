<?php declare(strict_types=1);

namespace PrinsFrank\SimpleTemplate;

use Laminas\Escaper\Escaper;

class TemplateRenderer {
    public function __construct(
        private readonly Escaper $escaper,
    ) {
    }

    /** @param array<string, mixed> $params */
    public function render(string $path, array $params): string {
        ob_start();

        $t = $this;
        $e = $this->escaper;
        require $path;

        return ob_get_clean();
    }
}
