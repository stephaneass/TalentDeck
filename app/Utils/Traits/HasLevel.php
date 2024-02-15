<?php

namespace App\Utils\Traits;

trait HasLevel{

    public function setBagLevel($level, $formated = true)
    {
        switch ($level) {
            case '1':
                return $this->formatBadge('Weak', 'warning', $formated);
                break;
            case '2':
                return $this->formatBadge('Medium', 'primary', $formated);
                break;
            case '3':
                return $this->formatBadge('High', 'success', $formated);
                break;
            default:
                return '';
                break;
        }
    }

    public function getFormatedLevelAttribute(){
        return $this->setBagLevel($this->level);
    }
}
