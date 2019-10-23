const version =  new Date().getTime();
const cachePrefix = 'bearbus-internal-';
const staticCacheName = `${cachePrefix}static-${version}`;
const expectedCaches = [staticCacheName];

addEventListener('install', event => {
  event.waitUntil((async () => {
    const cache = await caches.open(staticCacheName);

    await cache.addAll([
      './',
      './images/bearbus.png'
    ]);

    self.skipWaiting();
  })());
});

addEventListener('activate', event => {
  event.waitUntil((async () => {
    for (const cacheName of await caches.keys()) {
      if (!cacheName.startsWith(cachePrefix)) continue;
      if (!expectedCaches.includes(cacheName)) await caches.delete(cacheName);
    }
  })());
});

addEventListener('fetch', event => {
  const url = new URL(event.request.url);
  event.respondWith(
    caches.match(event.request).then(r => r || fetch(event.request))
  );
});