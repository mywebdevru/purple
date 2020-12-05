<?php

namespace App\View\Components\Vendor;

use Illuminate\View\Component;

class Swagger extends Component
{
    public $documentation;
    public $secure;
    public $urlToDocs;
    public $operationsSorter;
    public $configUrl;
    public $validatorUrl;

    /**
     * Create a new component instance.
     *
     * @param $documentation
     * @param $secure
     * @param $urlToDocs
     * @param $operationsSorter
     * @param $configUrl
     * @param $validatorUrl
     */
    public function __construct($documentation, $secure, $urlToDocs, $operationsSorter, $configUrl, $validatorUrl)
    {
        $this->documentation = $documentation;
        $this->secure = $secure;
        $this->urlToDocs = $urlToDocs;
        $this->operationsSorter = $operationsSorter;
        $this->configUrl = $configUrl;
        $this->validatorUrl = $validatorUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.vendor.swagger');
    }
}
