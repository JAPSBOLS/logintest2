function closeDialog() {
    document.getElementById('confirmModal').style.display = 'none';
}

function acceptReserve(id){
    console.log(id);
}

function declineReserve(id){
    window.location.href = 'decline.php?Th_ID=' + id;
}