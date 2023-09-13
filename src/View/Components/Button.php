<?php

namespace TasteUi\View\Components;

use Closure;
use Illuminate\View\Component;

//TODO: continue...
class Button extends Component
{
    public function __construct(
        public ?string $text = null,
        public ?string $icon = null,
        public ?string $position = 'right',
        public ?string $xs = null,
        public ?string $sm = null,
        public ?string $md = null,
        public ?string $lg = null,
        public ?string $size = null,
        public ?string $solid = null,
        public ?string $outline = null,
        public ?string $color = 'primary',
        public ?string $circle = null,
        public ?string $link = null,
        private ?string $style = null,
    ) {
        $this->style = $this->solid ? 'solid' : 'outline';
    }

    public function render(): Closure
    {
        return function (array $data) {
            return view('taste-ui::components.button', $this->merge($data))->render();
        };
    }

    protected function merge(array $data): array
    {
        $data['color'] = $this->colors();

        return $data;
    }

    private function colors(): string
    {
        $class = [
            'outline' => [
                'primary' => 'bg-primary-500 border border-primary-500 text-white',
                'secondary' => 'bg-secondary-500 border border-secondary-500 text-white',
                'green' => 'bg-green-500 border border-green-500 text-white',
                'red' => 'bg-red-500 border border-red-500 text-white',
                'yellow' => 'bg-yellow-500 border border-yellow-500 text-white',
                'blue' => 'bg-blue-500 border border-blue-500 text-white',
            ],
            'solid' => [
                'primary' => 'border border-primary-500 text-primary-800',
                'secondary' => 'border border-secondary-500 text-secondary-800',
                'green' => 'border border-green-500 text-green-800',
                'red' => 'border border-red-500 text-red-800',
                'yellow' => 'border border-yellow-500 text-yellow-800',
                'blue' => 'border border-blue-500 text-blue-800',
            ],
        ][$this->style][$this->color];

        return $class;
    }
}