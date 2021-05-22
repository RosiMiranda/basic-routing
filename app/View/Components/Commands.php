<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Commands extends Component
{
    public $hostname;
    public $commands;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $hostname, string $commands)
    {
        $this->hostname = $hostname;
        $this->commands = $commands;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.commands');
    }
}
