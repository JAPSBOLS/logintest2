function closeDialog() {
    document.getElementById('confirmModal').style.display = 'none';
}

function acceptReserve(id,rid){
    window.location.href = 'accept.php?Th_ID=' + id +'&ReservID='+rid;

}

function declineReserve(id){
    window.location.href = 'decline.php?Th_ID=' + id;
}