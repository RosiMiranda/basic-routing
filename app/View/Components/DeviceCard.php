<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeviceCard extends Component
{
    public $id;
    public $hostname;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $id, string $hostname)
    {
        $this->id = $id;
        $this->hostname = $hostname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.device-card');
    }
}
