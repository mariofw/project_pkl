<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.nav-link');
            const contentArea = document.getElementById('content-area');

            function loadDynamicContent(url) {
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
                        const headerContent = doc.querySelector('header .max-w-7xl');
                        const content = doc.querySelector('.py-12') || doc.querySelector('main');
                        
                        let newHTML = '';
                        if (headerContent) {
                            newHTML += headerContent.outerHTML;
                        }
                        if (content) {
                            newHTML += content.outerHTML;
                        }

                        if (newHTML) {
                            contentArea.innerHTML = newHTML;
                            
                            // Manually execute scripts from loaded content
                            const scripts = content.querySelectorAll('script');
                            scripts.forEach(script => {
                                const code = script.innerHTML;
                                if (code.includes('DOMContentLoaded')) {
                                    try {
                                        // The script is wrapped in DOMContentLoaded, so we extract the code and run it.
                                        const funcBody = code.substring(code.indexOf('{') + 1, code.lastIndexOf('}'));
                                        new Function(funcBody)();
                                    } catch (e) {
                                        console.error('Error executing script: ', e);
                                    }
                                }
                            });
                        } else {
                            console.error('Could not find content to load in fetched HTML.');
                            contentArea.innerHTML = '<p>Could not load content. Please check console for details.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching content:', error);
                        contentArea.innerHTML = '<p>Error loading content. Please check console for details.</p>';
                    });
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
                        method: method,
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json, text/html',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        if (response.redirected) {
                            loadDynamicContent(response.url);
                            return;
                        }
                        if (response.headers.get("Content-Type").includes("application/json")) {
                            return response.json();
                        }
                        return response.text();
                    })
                    .then(data => {
                        if (typeof data === 'object' && data !== null && data.redirect_url) {
                             loadDynamicContent(data.redirect_url);
                        }
                    })
                    .catch(error => {
                        console.error('Error submitting form:', error);
                        contentArea.innerHTML = '<p>Error submitting form. Please check console for details.</p>';
                    });
                }
            });
        });
    </script>
</x-app-layout>