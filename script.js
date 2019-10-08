this.addEventListener("install", function(event) {
  event.waitUntil(
    caches.open("v1").then(function(cache) {
      return cache.addAll([
       "/", 
       "/linkedit-ml.png",
       "/apple-icon-57x57.png",
       "/apple-icon-60x60.png",
       "/apple-icon-72x72.png",
       "/apple-icon-76x76.png",
       "/apple-icon-114x114.png",
       "/apple-icon-152x152.png",
       "/apple-icon-180x180.png",
       "/android-icon-36x36.png",
       "/android-icon-48x48.png",
       "/android-icon-72x72.png",
       "/android-icon-96x96.png",
       "/android-icon-144x144.png",
       "/android-icon-192x192.png",
       "/manifest.json",
       "/ms-icon-144x144.png",
       "https://www.googletagmanager.com/gtag/js?id=UA-124804614-1",
       "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css",
       "https://fonts.googleapis.com/css?family=Notable&display=swap",
       "https://code.jquery.com/jquery-3.4.1.min.js"

      ]);
    })
  );
});
this.addEventListener("fetch", function(event) {
  
  event.respondWith(
    
    caches.match(event.request).then(function(response){
      // caches.match() always resolves
      // but in case of success response will have value
      if (response !== undefined) {
        return response;
      } else {
        return fetch(event.request).then(function (response) {
          // response may be used only once
          // we need to save clone to put one copy in cache
          // and serve second one
          let responseClone = response.clone();
          caches.open("v1").then(function (cache) {
            cache.put(event.request, responseClone);
          });
          return response;
        }).catch(function () {
          return caches.match("/android-icon-192x192.png");
        });
      }
  }));
});