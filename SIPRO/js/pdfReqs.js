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

        let cotizacion = document.getElementById('cotizacion').value;
        let requisicion = document.getElementById('requisicion_id').value;
        let fecha = document.getElementById('fecha').value;
        let usuario = document.getElementById('usuario').value;
        let fechaEn = document.getElementById('fecha_envio').value;
        let factura = document.getElementById('factura').value;
        let ordenC = document.getElementById('orden_compra').value;

        // Recoge todas las partidas
        const partidas = Array.from(document.querySelectorAll('.partida')).map(partida => {
            return {
                num_partida: partida.querySelector('input[name*="[num_partida]"]').value,
                cantidad: partida.querySelector('input[name*="[cantidad]"]').value,
                u_m: partida.querySelector('input[name*="[u_m]"]').value,
                descripcion: partida.querySelector('textarea[name*="[descripcion]"]').value,
                orden_trabajo: partida.querySelector('input[name*="[orden_trabajo]"]').value,
                orden_salida: partida.querySelector('input[name*="[orden_salida]"]').value,
                ganancia_ingreso: partida.querySelector('input[name*="[ganancia_ingreso]"]').value,
                precio: partida.querySelector('input[name*="[precio]"]').value,
                ganancia_porcentaje: partida.querySelector('input[name*="[ganancia_porcentaje]"]').value,
            };
        });

        generatePDF(cotizacion, requisicion, fecha, usuario, fechaEn, factura, ordenC, partidas);
    });
});

async function generatePDF(cotizacion, requisicion, fecha, usuario, fechaEn, factura, ordenC, partidas) {
    const pdf = new jsPDF('p', 'pt', 'letter');
    const pageHeight = pdf.internal.pageSize.height;
    const margin = 40; // Margen superior e inferior
    const startX = 155;
    const startY = 295;
    const maxWidth = 210;
    const lineHeight = 12;
    let currentY = startY;

    // pdf.addImage(image, 'PNG', 0, 0, 612, 792);
    pdf.setFont("helvetica", "normal");
    pdf.setFontSize(40);
    pdf.text(cotizacion, 224, 115);

    pdf.setFontSize(14);
    pdf.text(requisicion, 444, 71);
    pdf.text(fecha, 442, 128);
    pdf.text(usuario, 130, 161);
    pdf.text(fechaEn, 85, 212);
    pdf.text(factura, 459, 183);
    pdf.text(ordenC, 478, 208);
    
    pdf.setFontSize(11);

    partidas.forEach((partida, index) => {
        if (currentY + lineHeight > pageHeight - margin) {
            pdf.addPage();
            currentY = margin;
        }
        
        pdf.text(partida.num_partida, 46, currentY);
        pdf.text(partida.cantidad, 81, currentY);
        pdf.setFontSize(8.5);
        pdf.text(partida.u_m, 108, currentY);
        pdf.setFontSize(11);
        pdf.text(partida.orden_trabajo, 376.5, currentY);
        pdf.text(partida.orden_salida, 419, currentY);
        pdf.text(partida.ganancia_ingreso, 463, currentY);
        pdf.text(partida.precio, 502, currentY);
        pdf.text(partida.ganancia_porcentaje, 554, currentY);

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

    pdf.save("requisicion.pdf");
}
