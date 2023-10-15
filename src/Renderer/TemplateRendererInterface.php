<?php
declare(strict_types=1);

namespace SchoolExchange\Core\Renderer;

interface TemplateRendererInterface
{
    public function render(string $templateName, mixed $data): string;
}