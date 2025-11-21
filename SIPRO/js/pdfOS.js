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
        let cantidad = document.getElementById('cantidad').value;
        let descripcion = document.getElementById('descripcion').value;
        let requisicion = document.getElementById('requisicion_id').value;
        let ordenT = document.getElementById('orden_de_trabajo').value;
        let controlC = document.getElementById('control_de_calidad').value;

        generatePDF(cliente, usuario, fechaE, noS, cantidad, descripcion, requisicion, ordenT, controlC);
    })
});

async function generatePDF(cliente, usuario, fechaE, noS, cantidad, descripcion, requisicion, ordenT, controlC) {
    //const image = await loadImage("salida.jpg");

    const pdf = new jsPDF('landscape', 'pt', 'letter');
    const pageWidth = pdf.internal.pageSize.width;
    const pageHeight = pdf.internal.pageSize.height;
    const margin = 40; // Margen superior e inferior
    const startX = 70;
    const startY = 250;
    const maxWidth = 400;
    const lineHeight = 12;
    let currentY = startY;

    //pdf.addImage(image, 'PNG', 0, 0, pageWidth, pageHeight);
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
    pdf.text(cantidad, 27, 250);
    //pdf.text(descripcion, 81, 295);
    pdf.text(requisicion, 487, 250);
    pdf.text(ordenT, 584, 250);
    pdf.text(controlC, 675, 250);

    //pdf.setFontSize(12);

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

    pdf.save("ordenSalida.pdf");
}
