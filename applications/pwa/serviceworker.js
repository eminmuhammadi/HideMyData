importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

workbox.googleAnalytics.initialize();

workbox.core.setCacheNameDetails({
  prefix: 'linkedit-ml',
  suffix: 'v1.0.0',
  precache: 'linkedit-custom-precache-name',
  runtime: 'linkedit-custom-runtime-name'
});


workbox.routing.registerRoute(
  '/index.php',
  new workbox.strategies.CacheFirst(),
);

workbox.routing.registerRoute(
  '/',
  new workbox.strategies.CacheFirst(),
);

workbox.routing.registerRoute(
  '/app.js',
  new workbox.strategies.CacheFirst(),
);

workbox.routing.registerRoute(
  '/style.css',
  new workbox.strategies.CacheFirst(),
);

workbox.routing.registerRoute(
  'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
  new workbox.strategies.CacheFirst(),
);

workbox.routing.registerRoute(
  'https://code.jquery.com/jquery-3.4.1.min.js',
  new workbox.strategies.CacheFirst(),
);

workbox.routing.registerRoute(
  ({ event }) => event.request.mode === 'navigate',
  ({ url }) => fetch(url.href).catch(() => caches.match('/'))
);

// runtime cache
// 1. stylesheet
workbox.routing.registerRoute(
    new RegExp('\.css$'),
    workbox.strategies.cacheFirst({
        cacheName: 'css-cache',
        plugins: [
            new workbox.expiration.Plugin({
                maxAgeSeconds: 60 * 60 * 24 * 7, // cache for one week
                maxEntries: 20, // only cache 20 request
                purgeOnQuotaError: true
            })
        ]
    })
);

// 2. images
workbox.routing.registerRoute(
    new RegExp('\.(png|svg|jpg|jpeg|gif|json)$'),
    workbox.strategies.cacheFirst({
        cacheName: 'image-cache',
        plugins: [
            new workbox.expiration.Plugin({
                maxAgeSeconds: 60 * 60 * 24 * 7,
                maxEntries: 50,
                purgeOnQuotaError: true
            })
        ]
    })
);

// 3. cache news articles result
workbox.routing.registerRoute(
    new RegExp('https://api.linkedit.ml'),
    workbox.strategies.staleWhileRevalidate({
        cacheName: 'api-cache',
        cacheExpiration: {
            maxAgeSeconds: 60 * 30 //cache the news content for 30mn
        }
    })
);
  
workbox.precaching.precacheAndRoute([]);