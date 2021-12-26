<?php

namespace Xproduct\Libraries\Common;

interface RequestInterface
{
    /**
     * To data request
     *
     * @param array $data
     *
     * @return RequestInterface
     */
    public function setData(array $data): self;

    /**
     * To get body attr
     *
     * @param string $parameter
     * @param mixed $default
     *
     * @return mixed
     */
    public function getAttr(string $parameter, $default = null);

    /**
     * Undocumented function
     *
     * @param string $parameter
     * @param mixed $default
     *
     * @return mixed
     */
    public function getFilter(string $parameter, $default = null);

    /**
     * To get the start point of data that we want
     *
     * @param mixed|null $default
     *
     * @return int|null
     */
    public function getStart($default = null): ?int;

    /**
     * To get the limit of data that we want
     *
     * @param mixed|null $default
     *
     * @return int|null
     */
    public function getSize($default = null): ?int;
}
