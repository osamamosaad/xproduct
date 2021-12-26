<?php

namespace Xproduct\Infrastructure\Adapters;

use Illuminate\Support\Arr;
use Xproduct\Libraries\Common\RequestInterface;

class Request implements RequestInterface
{
    private $data;

    public function setData(array $data): self
    {
        $this->data  = $data;

        return $this;
    }

    public function getAttr(string $parameter, $default = null)
    {
        return Arr::get($this->data, $parameter, $default);
    }

    public function getFilter(string $parameter, $default = null)
    {
        return Arr::get($this->data, "filter." . $parameter, $default);
    }

    public function getSize($default = null): ?int
    {
        return Arr::get($this->data, "page.size", $default);
    }

    public function getStart($default = null): ?int
    {
        return Arr::get($this->data, "page.start", $default);
    }
}
