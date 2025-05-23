<?php

declare(strict_types=1);

namespace TwigCsFixer\Tests\Rules\Function\NamedArgumentSeparator;

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use TwigCsFixer\Rules\Function\NamedArgumentSeparatorRule;
use TwigCsFixer\Test\AbstractRuleTestCase;

final class NamedArgumentSeparatorRuleTest extends AbstractRuleTestCase
{
    public function testRule(): void
    {
        if (!InstalledVersions::satisfies(new VersionParser(), 'twig/twig', '>=3.12.0')) {
            static::markTestSkipped('twig/twig ^3.12.0 is required.');
        }

        $this->checkRule(new NamedArgumentSeparatorRule(), [
            'NamedArgumentSeparator.Error:1:11' => 'Named arguments should be declared with the separator ":".',
        ]);
    }
}
