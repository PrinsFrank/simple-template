<?php declare(strict_types=1);

namespace PrinsFrank\SimpleTemplate\Tests\fixtures;

class ViewModel {
    /** @param array<string, string> $items */
    public function __construct(
        public readonly string $title,
        public readonly array  $items,
    ) {
    }
}
