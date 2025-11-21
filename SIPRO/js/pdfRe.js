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
        let partes = document.getElementById('num_partida').value;
        let cantidad = document.getElementById('cantidad').value;
        let um = document.getElementById('u_m').value;
        let descripcion = document.getElementById('descripcion').value;
        let ordenT = document.getElementById('orden_trabajo').value;
        let ordenS = document.getElementById('orden_salida').value;
        let gananciaD = document.getElementById('ganancia_ingreso').value;
        let precio = document.getElementById('precio').value;
        let gananciaP = document.getElementById('ganancia_porcentaje').value;

        

        generatePDF(cotizacion, requisicion, fecha, usuario, fechaEn, factura, ordenC, partes, cantidad, um, descripcion, ordenT, ordenS, gananciaD, precio, gananciaP);
    });
});

async function generatePDF(cotizacion, requisicion, fecha, usuario, fechaEn, factura, ordenC, partes, cantidad, um, descripcion, ordenT, ordenS, gananciaD, precio, gananciaP) {
    const pdf = new jsPDF('p', 'pt', 'letter');
    const pageHeight = pdf.internal.pageSize.height;
    const margin = 40; // Margen superior e inferior
    const startX = 155;
    const startY = 295;
    const maxWidth = 210;
    const lineHeight = 12;
    let currentY = startY;

    // Establecer Helvetica como la fuente para todo el documento
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
    pdf.text(partes, 46, 295);
    pdf.text(cantidad, 81, 295);
    pdf.setFontSize(8.5);
    pdf.text(um, 108, 295);
    pdf.setFontSize(11);
    pdf.text(ordenT, 376.5, 295);
    pdf.text(ordenS, 419, 295);
    pdf.text(gananciaD, 463, 295); // Mostrar el símbolo de dólar
    pdf.text(precio, 502, 295); // Mostrar el símbolo de dólar
    pdf.text(gananciaP, 554, 295); // Mostrar el símbolo de porcentaje

    // Dividir la descripción en líneas que se ajusten al ancho máximo permitido
    const lines = pdf.splitTextToSize(descripcion, maxWidth);

    lines.forEach(line => {
        if (currentY + lineHeight > pageHeight - margin) {
            pdf.addPage();
            currentY = margin;
        }
        pdf.text(line, startX, currentY);
        currentY += lineHeight;
    });

    pdf.setFillColor(0, 0, 0);

    pdf.save("requisicion.pdf");
}
