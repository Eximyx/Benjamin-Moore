<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    /**
     * @var array<mixed>
     */
    private array $queryParams;

    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }

    public function apply(Builder $builder): void
    {
        $this->before($builder);

        foreach ($this->getCallbacks() as $name => $callback) {
            if (isset($this->queryParams[$name])) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    abstract protected function getCallbacks(): array;

    /**
     * @param string $key
     * @param mixed|null $default
     * @return array|null
     */
    protected function getQueryParam(string $key, mixed $default = null): ?array
    {
        return $this->queryParams[$key] ?? $default;
    }

    protected function removeQueryParam(string ...$keys): AbstractFilter
    {
        foreach ($keys as $key) {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
