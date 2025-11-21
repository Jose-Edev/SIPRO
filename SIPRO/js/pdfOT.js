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

        let ordenT = document.getElementById('orden_trabajo').value;
        let requisicion = document.getElementById('requisicion_id').value;
        let usuario = document.getElementById('usuario').value;
        let cantidad = document.getElementById('cantidad').value;
        let descripcion = document.getElementById('descripcion').value;
        let reporteF = document.getElementById('reporte_fotos').value;
        let muestra = document.getElementById('muestra').value;
        let plano = document.getElementById('plano').value;
        let sobreP = document.getElementById('sobre_pieza').value;
        let material = document.getElementById('material').value;
        let fechaE = document.getElementById('fecha_entrega').value;
        let fechaEla = document.getElementById('fecha_elab').value;
        
        generatePDF(ordenT, requisicion, usuario, cantidad, descripcion, reporteF, muestra, plano, sobreP, material, fechaE, fechaEla);
    })
});

async function generatePDF(ordenT, requisicion, usuario, cantidad, descripcion, reporteF, muestra, plano, sobreP, material, fechaE, fechaEla) {
    //const image = await loadImage("orden.jpg");

    const width = 297.64;  // 10.5 cm in points
    const height = 392.13; // 13.8 cm in points

    const pdf = new jsPDF({
        orientation: 'portrait',
        unit: 'pt',
        format: [width, height]
    });

    const pageHeight = pdf.internal.pageSize.height;
    const margin = 40; // Margen superior e inferior
    const startX = 58; // Ajustado para el nuevo tamaño de página
    const startY = 144; // Ajustado para el nuevo tamaño de página
    const maxWidth = 215; // Ajustado para el nuevo tamaño de página
    const lineHeight = 12;
    let currentY = startY;

    const margin2 = 40; // Margen superior e inferior
    const startX2 = 73; // Ajustado para el nuevo tamaño de página
    const startY2 = 313; // Ajustado para el nuevo tamaño de página
    const maxWidth2 = 205; // Ajustado para el nuevo tamaño de página
    const lineHeight2 = 12;
    let currentY2 = startY2;

    //pdf.addImage(image, 'PNG', 0, 0, width, height);
    pdf.setFont("helvetica", "normal");
    pdf.setFontSize(35);
    pdf.text(ordenT, 168, 53);

    pdf.setFontSize(12);
    pdf.text(requisicion, 160, 82);

    pdf.setFontSize(13);
    pdf.text(usuario, 96, 102);
    pdf.setFontSize(13);
    if (reporteF === 'SI') {
        pdf.text('X', 176, 258);
    } if (reporteF === 'NO') {
        pdf.text('X', 245, 258);
    };

    if (muestra === 'SI') {
        pdf.text('X', 79, 294);
    };

    if (plano === 'SI') {
        pdf.text('X', 150, 294);
    };

    if (sobreP === 'SI') {
        pdf.text('X', 256, 294);
    };

    pdf.text(fechaE, 128, 367);
    pdf.text(fechaEla, 24, 80);

    //pdf.setFontSize(11);
    //pdf.text(material, 73, 313);
    

    pdf.setFontSize(11);
    pdf.text(cantidad, 21, 144);
    // Dividir la descripción en líneas que se ajusten al ancho máximo permitido
    const lines = pdf.splitTextToSize(descripcion, maxWidth);
    const lines2 = pdf.splitTextToSize(material, maxWidth2);

    lines.forEach(line => {
        if (currentY + lineHeight > pageHeight - margin) {
            pdf.addPage();
            currentY = margin;
        }
        pdf.text(line, startX, currentY);
        currentY += lineHeight;
    });

    lines2.forEach(line => {
        if (currentY2 + lineHeight2 > pageHeight - margin2) {
            pdf.addPage();
            currentY2 = margin2;
        }
        pdf.text(line, startX2, currentY2);
        currentY2 += lineHeight2;
    });

    pdf.setFillColor(0, 0, 0);

    pdf.save("ordenTrabajo.pdf");
}