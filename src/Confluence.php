<?php

namespace LaravelFans\Confluence;

use Confluence\Base;

class Confluence
{
    private Base $resource;

    public function resource(string $resource): Confluence
    {
        if (empty($this->resource)) {
            $this->resource = new $resource(config('confluence'));
        }

        return $this;
    }

    public function setResource(Base $resource): void
    {
        $this->resource = $resource;
    }

    public function destroy($id, $params = [])
    {
        return $this->resource->destroy($id, $params);
    }

    public function index(array $params = [])
    {
        return $this->resource->index($params);
    }

    public function show(int $id, array $params = [])
    {
        return $this->resource->show($id, $params);
    }

    public function store(array $params)
    {
        return $this->resource->store($params);
    }

    public function update($id, array $params)
    {
        return $this->resource->update($id, $params);
    }
}
