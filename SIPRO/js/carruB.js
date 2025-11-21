const items = Array.from(document.querySelectorAll('.slider-item')).map(item => ({
    type: item.getAttribute('data-type'),
    src: item.getAttribute('data-src'),
    title: item.getAttribute('data-title'),
    description: item.getAttribute('data-description')
}));

let currentIndex = 0;

function updateCarousel() {
    const mediaContainer = document.querySelector('.carousel-media');
    const titleElement = document.getElementById('carousel-title');
    const descriptionElement = document.getElementById('carousel-description');
    const indicators = document.querySelectorAll('.carousel-indicators2 span');

    const currentItem = items[currentIndex];

    mediaContainer.innerHTML = '';
    if (currentItem.type === 'image') {
        const img = document.createElement('img');
        img.src = currentItem.src;
        img.classList.add('slider-media');
        mediaContainer.appendChild(img);
    } else if (currentItem.type === 'video') {
        const iframe = document.createElement('iframe');
        iframe.src = currentItem.src;
        iframe.classList.add('slider-media');
        iframe.frameBorder = "0";
        iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share";
        iframe.allowFullscreen = true;
        mediaContainer.appendChild(iframe);
    }

    titleElement.textContent = currentItem.title;
    descriptionElement.textContent = currentItem.description;

    indicators.forEach((indicator, index) => {
        indicator.classList.toggle('active', index === currentIndex);
    });
}

function createIndicators() {
    const indicatorsContainer = document.querySelector('.carousel-indicators2');
    items.forEach((item, index) => {
        const span = document.createElement('span');
        span.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel();
        });
        indicatorsContainer.appendChild(span);
    });
}

document.getElementById('prev-btn').addEventListener('click', () => {
    currentIndex = (currentIndex === 0) ? items.length - 1 : currentIndex - 1;
    updateCarousel();
});

document.getElementById('next-btn').addEventListener('click', () => {
    currentIndex = (currentIndex === items.length - 1) ? 0 : currentIndex + 1;
    updateCarousel();
});

createIndicators();
updateCarousel();