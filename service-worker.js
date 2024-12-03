self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open('my-cache').then((cache) => {
      return cache.addAll([
        
        '/Blog/blog.php',
        '/Blog/category.php',
        '/Blog/login.php',
        '/Blog/signup.php',
        '/Blog/blog-view.php',
        '/Blog/admin-login.php',
        
        '/Blog/admin/Post.php',
        '/Blog/admin/Category.php',
        '/Blog/admin/Comment.php',
        '/Blog/admin/logout.php',
        '/Blog/admin/post-add.php',
        '/Blog/admin/category-add.php',
        '/Blog/css/style.css',
        '/Blog/css/side-bar.css',
        '/Blog/js/jquery.richtext.min.js',
        'Blog/img/logo.png',
        'Blog/manifest.json',
        // Añadir todos los archivos necesarios
      ]);
    }).catch((error) => {
      console.log('Error al agregar archivos al caché:', error);
    })
  );
});

self.addEventListener('activate', (event) => {
  // Se elimina el caché obsoleto cuando el Service Worker se activa
  const cacheWhitelist = ['my-cache'];  // Asegúrate de que tu caché actual esté en esta lista
  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cacheName) => {
          if (!cacheWhitelist.includes(cacheName)) {
            return caches.delete(cacheName);  // Elimina cachés antiguos
          }
        })
      );
    })
  );
});
