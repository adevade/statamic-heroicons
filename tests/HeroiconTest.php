<?php

namespace StefanGalescu\Heroicons\Tests;

use Statamic\Statamic;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertStringContainsString;

class HeroiconTest extends TestCase
{
    public function test_can_render_heroicon_using_outline_variant(): void
    {
        $variant = 'outline';
        $icon = 'bars-3';

        $render = $this->render($variant, $icon);
        $svg = $this->getSvgAsset($variant, $icon);

        assertEquals($render, $svg);
    }

    public function test_can_render_heroicon_using_solid_variant(): void
    {
        $variant = 'solid';
        $icon = 'bars-3';

        $render = $this->render($variant, $icon);
        $svg = $this->getSvgAsset($variant, $icon);

        assertEquals($render, $svg);
    }

    public function test_can_render_heroicon_using_mini_variant(): void
    {
        $variant = 'mini';
        $icon = 'bars-3';

        $render = $this->render($variant, $icon);
        $svg = $this->getSvgAsset($variant, $icon);

        assertEquals($render, $svg);
    }

    public function test_can_render_heroicon_using_micro_variant(): void
    {
        $variant = 'micro';
        $icon = 'bars-3';

        $render = $this->render($variant, $icon);
        $svg = $this->getSvgAsset($variant, $icon);

        assertEquals($render, $svg);
    }

    public function test_can_add_attributes_to_svg(): void
    {
        $render = $this->render('outline', 'bars-3', ['class' => 'w-6 h-6', 'title="Main menu"']);

        assertStringContainsString('class="w-6 h-6"', $render);
        assertStringContainsString('title="Main menu"', $render);
    }

    public function test_can_add_dynamically_binded_attributes_to_svg(): void
    {
        $render = $this->render('outline', 'bars-3', ['x-bind:class' => "true ? 'w-6 h-6' : 'w-5 h-5'"]);

        assertStringContainsString('x-bind:class="true ? \'w-6 h-6\' : \'w-5 h-5\'"', $render);
    }

    public function test_will_not_throw_when_icon_name_is_invalid(): void
    {
        $render = $this->render('outline', 'invalid-icon-name');

        assertNull($render);
    }

    protected function render(string $variant, string $icon, array $attrs = []): ?string
    {
        return Statamic::tag('heroicon')
            ->params([
                'variant' => $variant,
                'icon' => $icon,
                ...$attrs,
            ])
            ->fetch();
    }

    protected function getSvgAsset(string $variant, string $icon): string
    {
        $variant = match ($variant) {
            'outline' => 'o',
            'solid' => 's',
            'mini' => 'm',
            'micro' => 'c',
        };

        return svg("heroicon-{$variant}-{$icon}")->toHtml();
    }
}
