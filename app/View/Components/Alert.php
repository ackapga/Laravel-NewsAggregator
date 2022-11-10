<?php declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * @param string $type
     * @param string $message
     */
    public function __construct(
        public string $type,
        public string $message
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
