<?php

namespace Yab\Mint\Macros;

use Closure;

class FactoryBuilder
{
    /**
     * @return Closure
     */
    public function withoutEvents()
    {
        return function() {
            $this->class::flushEventListeners();
  
            return $this;
        };
    }
}