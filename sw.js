self.addEventListener("install", function(event) {

    event.waitUntill(

        caches.open("sw-cache").then(function(cache) {

            return cache.add(base_url);

        })

    );

})

self.addEventListener("fetch", function(event) {

    event.respondWith(

        caches.match(event.request).then(function(response) {

            return response || fetch(event.request);

        })

    )

})