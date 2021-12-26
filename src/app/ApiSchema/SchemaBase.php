<?php

namespace App\ApiSchema;

use InvalidArgumentException;

abstract class SchemaBase
{

    public function __construct(
        private $data
    ) {
    }

    /**
     * to prepare schema
     *
     * @param array|object $data
     *
     * @return array
     */
    abstract protected function prepare($data): array;

    /**
     * To handle web response
     *
     * @param mixed $statusCode
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function response(int $statusCode)
    {
        if (is_object($this->data)) {
            return response($this->prepare($this->data), $statusCode);
        }

        if (is_array($this->data)) {
            if (empty($this->data)) {
                return response([], $statusCode);
            }

            $frist = reset($this->data);
            if (!is_object($frist) && !is_array($frist)) {
                return response($this->prepare($this->data), $statusCode);
            }

            $response = [];
            foreach ($this->data as $result) {
                $response[] = $this->prepare($result);
            }
            return response($response, $statusCode);
        }

        throw new InvalidArgumentException();
    }
}
