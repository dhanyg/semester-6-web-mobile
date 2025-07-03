self.addEventListener("fetch", event => {
    const options = {
        status: 200,
        headers: {
            'Content-type': 'text/html'
        }
    };
    const htmlResponse = new Response(`
    <b>Created by the Service Worker</b>
    <p>You loaded ${event.request.url}</p>
    
    `, options);
    event.respondWith(htmlResponse);

})