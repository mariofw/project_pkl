<x-app-layout>


    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white p-4">
            <h3 class="text-lg font-semibold mb-4">Manage Website</h3>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('admin.hero.edit') }}" class="block p-2 rounded hover:bg-gray-700 nav-link">Edit Title</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.hero-images.index') }}" class="block p-2 rounded hover:bg-gray-700 nav-link">Edit Slide Foto</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.services.index') }}" class="block p-2 rounded hover:bg-gray-700 nav-link">Edit Layanan Utama</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.abouts.edit') }}" class="block p-2 rounded hover:bg-gray-700 nav-link">Edit Tentang Kami, Visi dan Misi</a>
                    </li>
                    
                    <li class="mb-2">
                        <a href="{{ route('admin.articles.index') }}" class="block p-2 rounded hover:bg-gray-700 nav-link">Edit Artikel</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.partnerships.index') }}" class="block p-2 rounded hover:bg-gray-700 nav-link">Edit Partnership</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.offers.index') }}" class="block p-2 rounded hover:bg-gray-700 nav-link">Edit Offer</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('profile.edit') }}" class="block p-2 rounded hover:bg-gray-700 nav-link">Edit Profile</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-6 bg-gray-100 dark:bg-gray-900 overflow-y-auto" id="content-area">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome to the Admin Dashboard! Select an option from the sidebar to get started.") }}
                </div>
            </div>
        </div>
    </div>

    <style>
        #content-area {
            transition: opacity 0.3s ease-in-out;
        }
        .fade-out {
            opacity: 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.nav-link');
            const contentArea = document.getElementById('content-area');

            function loadDynamicContent(url) {
                contentArea.classList.add('fade-out');

                setTimeout(() => {
                    fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.text();
                        })
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            
                            const content = doc.querySelector('.py-12') || doc.querySelector('main') || doc.body;
                            if (content) {
                                contentArea.innerHTML = content.innerHTML;
                                
                                const scripts = content.querySelectorAll('script');
                                scripts.forEach(script => {
                                    const newScript = document.createElement('script');
                                    newScript.innerHTML = script.innerHTML;
                                    contentArea.appendChild(newScript);
                                });

                            } else {
                                console.error('Could not find content to load in fetched HTML.');
                                contentArea.innerHTML = '<p>Could not load content. Please check console for details.</p>';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching content:', error);
                            contentArea.innerHTML = '<p>Error loading content. Please check console for details.</p>';
                        })
                        .finally(() => {
                            contentArea.classList.remove('fade-out');
                        });
                }, 300); // Corresponds to the transition duration
            }

            // Sidebar links
            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const url = this.getAttribute('href');
                    navLinks.forEach(navLink => navLink.classList.remove('bg-gray-700'));
                    this.classList.add('bg-gray-700');
                    loadDynamicContent(url);
                });
            });

            // Links inside the content area
            contentArea.addEventListener('click', function(e) {
                const target = e.target.closest('a');
                if (target && target.href && target.host === window.location.host && !target.getAttribute('target')) {
                    e.preventDefault();
                    loadDynamicContent(target.href);
                }
            });

            // Forms inside the content area
            contentArea.addEventListener('submit', function(e) {
                const form = e.target.closest('form');
                if (form) {
                    e.preventDefault();
                    const url = form.action;
                    const formData = new FormData(form);
                    const method = (form.querySelector('input[name="_method"]')?.value || form.method).toUpperCase();

                    fetch(url, {
                        method: method === 'GET' ? 'GET' : 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json, text/html',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        // Clear previous errors on new submission attempt
                        form.querySelectorAll('.input-error-msg').forEach(el => el.remove());
                        form.querySelectorAll('.border-red-500').forEach(el => el.classList.remove('border-red-500'));

                        if (response.status === 422) {
                            response.json().then(data => {
                                if (data.errors) {
                                    Object.keys(data.errors).forEach(key => {
                                        const field = form.querySelector(`[name="${key}"]`);
                                        if (field) {
                                            field.classList.add('border-red-500');
                                            const errorElement = document.createElement('div');
                                            errorElement.classList.add('input-error-msg', 'text-red-600', 'dark:text-red-400', 'text-sm', 'mt-1');
                                            errorElement.textContent = data.errors[key][0];
                                            field.parentNode.insertBefore(errorElement, field.nextSibling);
                                        }
                                    });
                                }
                            });
                            return Promise.reject(null); // Stop promise chain for validation error
                        }

                        if (response.redirected) {
                            loadDynamicContent(response.url);
                            return Promise.reject(null); // Stop promise chain for redirect
                        }

                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        
                        if (response.headers.get("Content-Type").includes("application/json")) {
                            return response.json();
                        }
                        return response.text();
                    })
                    .then(data => {
                        if (data && typeof data === 'object' && data.redirect_url) {
                            loadDynamicContent(data.redirect_url);
                        }
                    })
                    .catch(error => {
                        if (error) { // Only log if there's an actual error object
                            console.error('Error submitting form:', error);
                            contentArea.innerHTML = '<p>Error submitting form. Please check console for details.</p>';
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>