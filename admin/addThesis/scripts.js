

$(document).ready( function () {
    $('#myTable').DataTable();
});

function confirmDelete(id) {
    document.getElementById('confirmation-dialog').style.display = 'block';
    document.getElementById('delete-button').onclick = function() {
        window.location.href = 'delete.php?Th_ID=' + id;
    };
}

function closeDialog() {
    document.getElementById('confirmation-dialog').style.display = 'none';
}


function checkform() {
    var inputs = document.querySelectorAll(".input-field input, #abstract");
    var isValid = Array.from(inputs).every(input => input.value.trim() !== "");
    document.getElementById("formButton").disabled = !isValid;
}
