document.addEventListener("keyup", e => {
    if (e.target.matches("#buscador")) {
        if (e.key === "Escape") e.target.value = "";

        const searchText = e.target.value.toLowerCase();

        document.querySelectorAll(".baseD").forEach(row => {
            row.classList.remove("filtro");
            
            // Limpiar resaltados previos
            row.innerHTML = row.innerHTML.replace(/<mark class="resaltado">(.*?)<\/mark>/g, "$1");

            if (searchText) {
                const regex = new RegExp(`(${searchText})`, 'gi');
                const highlightText = (node) => {
                    if (node.nodeType === Node.TEXT_NODE) {
                        const newNode = document.createElement('span');
                        newNode.innerHTML = node.textContent.replace(regex, '<mark class="resaltado">$1</mark>');
                        node.parentNode.replaceChild(newNode, node);
                    } else if (node.nodeType === Node.ELEMENT_NODE) {
                        node.childNodes.forEach(highlightText);
                    }
                };

                highlightText(row);

                // Filtrar filas que no contienen el texto buscado
                if (!row.innerHTML.toLowerCase().includes(searchText)) {
                    row.classList.add("filtro");
                }
            }
        });
    }
});