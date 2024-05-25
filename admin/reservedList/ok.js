function closeDialog() {
    document.getElementById('confirmModal').style.display = 'none';
}

function removeReserve(id,rid){
    window.location.href = 'removeReserve.php?Th_ID=' + id +'&ReservID='+rid;
}