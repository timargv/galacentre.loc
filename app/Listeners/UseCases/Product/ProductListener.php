<?php

namespace App\Listeners\UseCases\Product;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductListener
{
    private $key;
    private $summonerId;
    private $championId;
    private $inStats;

    public function start_document()
    {
        $this->key        = null;
        $this->summonerId = null;
        $this->championId = null;
        $this->inStats    = false;
    }

    public function start_object()
    {
        if ($this->key === 'stats') {
            $this->inStats = true;
        } else if ($this->inStats) {
            $this->championId = $this->key;
        }
    }

    public function end_object()
    {
        if ($this->championId !== null) {
            $this->championId = null;
        } else if ($this->inStats) {
            $this->inStats = false;
        } else {
            $this->summonerId = null;
        }
    }

    public function key($key)
    {
        $this->key = $key;
    }

    public function value($value)
    {
        switch ($this->key) {
            case 'summonerId':
                $this->summonerId = $value;
                break;
            case 'totalSessionsPlayed':
                echo "{$this->summonerId},{$this->championId},$value\n";
                break;
        }
    }
}
