<?php

namespace App\Utils\Traits;

trait HasState{

    public function setBagState($state, $formated = true)
    {
        switch ($state) {
            case 'updated':
                return $this->formatBadge('Updated', 'warning', $formated);
                break;
            case 'pending':
                return $this->formatBadge('Pending', 'warning', $formated);
                break;
            case 'created':
                return $this->formatBadge('Actived', 'success', $formated);
                break;
            case 'validated':
                return $this->formatBadge('Validated', 'success', $formated) ;
                break;
            case 'rejected':
                return $this->formatBadge('Rejeted', 'danger', $formated) ;
                break;
            case 'suspended':
                return $this->formatBadge('Suspended', 'danger', $formated) ;
                break;
            default:
                return '';
                break;
        }
    }

    public function formatBadge($libelle, $color="info", $formated=true)
    {
        if(!$formated) return $libelle;

        return '<span class="badge bg-'.$color.'">'.$libelle.'</span>';
    }

    public function getFormatedStateAttribute(){
        return $this->setBagState($this->state);
    }
    
    public function getFormatedOperationStateAttribute(){
        return $this->setBagState($this->payement_state);
    }
}
