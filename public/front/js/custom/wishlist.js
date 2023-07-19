function setWishlist(id) {
    console.log(id);
    fetch(`/wishlist/${id}`, {
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        method: "post"
    })
        .then(response => response.json())
        .then(response => {
            let but = document.getElementById(`but-wishlist[${id}]`);
            let svg = document.getElementById(`svg-wishlist[${id}]`);
            if(response.message == 'ok'){
                but.classList.add('bg-warning');
                svg.setAttribute('style',  'fill : #fff');
            }else if(response.message == "Already exists"){
                but.classList.remove('bg-warning');
                svg.removeAttribute('style',  'fill : #fff');

            }
        })
        .catch(error => console.log("error : " + error));
}

function deleteWishlist(id) {
    fetch(`/wishlist/${id}`, {
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        method: "delete"
    })
        .then(response => response.json())
        .then(response => {
            let row = document.getElementById(`product[${id}]`);
            let erroes = document.getElementById('erroes');
            if(response.message == 'emty'){
                let table = document.getElementById("table-wishlist");
                table.parentNode.removeChild(table);
                document.getElementById("div-wishlist").textContent =
                    "ط¹ط°ط§ ظ„ط§ ظٹظˆط¬ط¯ ط¨ظٹط§ظ†ط§طھ ظپظٹ ط§ظ„ط³ظ„ط©";
            }else if(response.message == 'ok'){
                row.parentNode.removeChild(row);

            }else if(response.message == 'not found'){
                erroes.innerHTML = "ط¹ط°ط±ط§ ط§ظ„ظ…ظ†طھط¬ ط؛ظٹط± ظ…طھظˆط§ط¬ط¯ ظپظٹ ط§ظ„ظ…ظپط¶ظ„ط©";
            }
        })
        .catch(error => console.log("error : " + error));
}