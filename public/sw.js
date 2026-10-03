const CACHE_NAME = 'bkwitten-faq-v3';

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll([
                '/faq',
                '/manifest.webmanifest',
                '/images/faq/schulgebäude.png',
            ]);
        })
    );

    self.skipWaiting();
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames
                    .filter((name) => name !== CACHE_NAME)
                    .map((name) => caches.delete(name))
            );
        })
    );

    self.clients.claim();
});

self.addEventListener('fetch', (event) => {
    const request = event.request;

    // Nur GET-Anfragen behandeln
    if (request.method !== 'GET') {
        return;
    }

    const url = new URL(request.url);

    // Nur eigene Ressourcen behandeln
    if (url.origin !== self.location.origin) {
        return;
    }

    // Der News-Feed wird nicht offline bereitgestellt.
    if (url.pathname.startsWith('/news')) {
        return;
    }

    /*
     * FAQ:
     * Wenn online, wird die aktuelle FAQ verwendet und
     * gleichzeitig aktualisiert. Offline wird die gespeicherte
     * Version verwendet.
     */
    if (url.pathname === '/faq') {
        event.respondWith(
            fetch(request)
                .then((response) => {
                    const responseClone = response.clone();

                    caches.open(CACHE_NAME).then((cache) => {
                        cache.put(request, responseClone);
                    });

                    return response;
                })
                .catch(() => {
                    return caches.match(request);
                })
        );

        return;
    }

    /*
     * Statische Dateien:
     * CSS, JavaScript, Bilder und Manifest werden beim ersten
     * Online-Aufruf gespeichert.
     */
    const isStaticResource =
        request.destination === 'style' ||
        request.destination === 'script' ||
        request.destination === 'image' ||
        request.destination === 'font' ||
        url.pathname === '/manifest.webmanifest';

    if (isStaticResource) {
        event.respondWith(
            caches.match(request).then((cachedResponse) => {
                if (cachedResponse) {
                    return cachedResponse;
                }

                return fetch(request).then((response) => {
                    const responseClone = response.clone();

                    caches.open(CACHE_NAME).then((cache) => {
                        cache.put(request, responseClone);
                    });

                    return response;
                });
            })
        );
    }
});