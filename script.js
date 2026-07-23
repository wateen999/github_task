function toggleStatus(id) {

    fetch("toggle.php", {
        method: "POST",

        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },

        body: "id=" + id
    })

    .then(response => response.text())

    .then(status => {

        const row = document.getElementById("row-" + id);

        row.querySelector(".status").textContent = status;

    })

    .catch(error => {

        console.error("Error:", error);

    });

}