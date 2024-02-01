class State{
    constructor(label = ""){
        this.label = label
    }

    formatLabel (label){
        switch (label) {
            case 'updated':
                return this.labelFormated('Modifié', 'warning');
                break;
            case 'pending':
                return this.labelFormated('En attente', 'warning');
                break;
            case 'created':
                return this.labelFormated('Non à jour', 'primary');
                break;
            case 'validated':
                return this.labelFormated('Validé(e)', 'success') ;
                break;
            case 'rejected':
                return this.labelFormated('Rejeté(e)', 'danger') ;
                break;
            case 'payment_pending':
                return this.labelFormated('En attente', 'warning') ;
                break;
            case 'succeed':
                return this.labelFormated('Confirmée', 'success') ;
                break;
            case 'Recharger':
                return this.labelFormated('Recharger', 'info') ;
                break;
            case 'Transfert':
                return this.labelFormated('Transfert', 'success') ;
                break;
            case 'Recevoir':
                return this.labelFormated('Recevoir', 'primary') ;
                break;
            case 'Retirer':
                return this.labelFormated('Retirer', 'warning') ;
                break;
            default:
                return this.labelFormated(label, 'info') ;
                break;
        } 
    }

    labelFormated (label, color){
        return '<span class="badge bg-' +color+ '">' +label+ '</span>';;
    }
}