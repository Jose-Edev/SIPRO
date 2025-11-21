function loadImage(url) {
    return new Promise(resolve => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = "blob";
        xhr.onload = function (e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const res = event.target.result;
                resolve(res);
            }
            const file = this.response;
            reader.readAsDataURL(file);
        }
        xhr.send();
    });
}

window.addEventListener('load', async () => {
    const form = document.querySelector('#form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let cliente = document.getElementById('cliente').value;
        let usuario = document.getElementById('usuario').value;
        let fechaE = document.getElementById('fecha_de_entrega').value;
        let noS = document.getElementById('numero_de_salida').value;

        // Recoge todas las partidas
        const partidas = Array.from(document.querySelectorAll('.partida')).map(partida => {
            return {
                cantidad: partida.querySelector('input[name*="[cantidad]"]').value,
                descripcion: partida.querySelector('textarea[name*="[descripcion]"]').value,
                orden_de_trabajo: partida.querySelector('input[name*="[orden_de_trabajo]"]').value,
                requisicion_id: partida.querySelector('input[name*="[requisicion_id]"]').value,
                control_de_calidad: partida.querySelector('input[name*="[control_de_calidad]"]').value,
            };
        });

        generatePDF(cliente, usuario, fechaE, noS, partidas);
    });
});

async function generatePDF(cliente, usuario, fechaE, noS, partidas) {
    // const image = await loadImage("salida.jpg");

    const pdf = new jsPDF('landscape', 'pt', 'letter');
    const pageWidth = pdf.internal.pageSize.width;
    const pageHeight = pdf.internal.pageSize.height;
    const margin = 40; // Margen superior e inferior
    const startX = 70;
    const startY = 250;
    const maxWidth = 400;
    const lineHeight = 12;
    let currentY = startY;

    // pdf.addImage(image, 'PNG', 0, 0, pageWidth, pageHeight);
    pdf.setFont("helvetica", "normal");
    pdf.setFontSize(14);
    pdf.text(cliente, 188, 142);
    pdf.setFontSize(12);
    pdf.text(usuario, 188, 164);
    pdf.setFontSize(10);
    pdf.text(fechaE, 475, 167);
    pdf.setFontSize(30);
    pdf.text(noS, 540, 138);
    
    pdf.setFontSize(11);

    // Procesa todas las partidas
    partidas.forEach((partida, index) => {
        if (currentY + lineHeight > pageHeight - margin) {
            pdf.addPage();
            currentY = margin;
        }

        pdf.text(partida.cantidad, 27, currentY);
        pdf.text(partida.requisicion_id, 487, currentY);
        pdf.text(partida.orden_de_trabajo, 584, currentY);
        pdf.text(partida.control_de_calidad, 675, currentY);

        const lines = pdf.splitTextToSize(partida.descripcion, maxWidth);
        lines.forEach(line => {
            if (currentY + lineHeight > pageHeight - margin) {
                pdf.addPage();
                currentY = margin;
            }
            pdf.text(line, startX, currentY);
            currentY += lineHeight;
        });

        currentY += lineHeight; // Añadir espacio entre partidas
    });

    pdf.setFillColor(0, 0, 0);

    pdf.save("ordenSalida.pdf");
}
