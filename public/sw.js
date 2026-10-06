const CACHE_NAME = 'bkwitten-faq-v5';

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll([
                '/faq',
                '/offline',
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

    if (url.origin !== self.location.origin) {
        return;
    }

    if(url.pathname === '/'){
        event.respondWith(
            fetch(request)
            .catch(() => {
                return caches.match('/offline');
            })
        );
        return;
    }

    //Wenn online, wird die aktuelle FAQ verwendet und aktualisier
    //Offline wird der gespeicherte Cache verwendet
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

    // Statische Dateien über den Cache laden
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