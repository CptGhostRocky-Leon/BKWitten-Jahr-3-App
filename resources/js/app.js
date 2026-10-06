if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then((registration) => {
                console.log(
                    'Service Worker registriert:',
                    registration.scope
                );
            })
            .catch((error) => {
                console.error(
                    'Service Worker konnte nicht registriert werden:',
                    error
                );
            });
    });

    document.addEventListener('DOMContentLoaded', () => {
        const images = document.querySelectorAll('img');

        images.forEach((image) => {
            if (image.complete) {
                return;
            }

            image.classList.add('opacity-0');

            image.addEventListener('load', () => {
                image.classList.remove('opacity-0');
            });
        });
    });

}