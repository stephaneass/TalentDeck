class CustomDate {
    months = [
      'Janvier',
      'Février',
      'Mars',
      'Avril',
      'Mai',
      'Juin',
      'Juillet',
      'Août',
      'Septembre',
      'Octobre',
      'Novembre',
      'Décembre'
    ];

    formatDate(dateString){
        const date = new Date(dateString);

        const day = date.getDate();
        const month = this.months[date.getMonth()];
        const year = date.getFullYear();
        const hours = date.getHours();
        const minutes = date.getMinutes();
        const seconds = date.getSeconds();

        return `${day} ${month} ${year} à ${hours}h${minutes}min${seconds}s`;
    }
}