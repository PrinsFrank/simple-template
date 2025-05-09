<?php declare(strict_types=1);

namespace PrinsFrank\SimpleTemplate\Tests\Unit;

use Laminas\Escaper\Escaper;
use Laminas\Escaper\Exception\InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\SimpleTemplate\TemplateRenderer;
use PrinsFrank\SimpleTemplate\Tests\fixtures\ViewModel;
use RuntimeException;

#[CoversClass(TemplateRenderer::class)]
class TemplateRendererTest extends TestCase {
    /** @throws InvalidArgumentException|RuntimeException */
    public function testRenderToString(): void {
        static::assertSame(
            <<<EOD
            <html>
                <head>
                    <title>foo</title>
                </head>
                <body>
                    <a href="javascript&#x3A;alert&#x28;&#x27;Hello&#x27;&#x29;&#x3B;">foo</a>
                    <a href="">bar</a>
                </body>
            </html>
            EOD . PHP_EOL,
            (new TemplateRenderer(new Escaper()))->renderToString(
                dirname(__DIR__) . '/fixtures/layout.php',
                new ViewModel(
                    'foo',
                    [
                        'javascript:alert(\'Hello\');' => 'foo',
                        '' => 'bar'
                    ]
                ),
            )
        );
    }
}
