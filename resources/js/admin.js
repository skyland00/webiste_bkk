// resources/js/admin.js

// Fungsi untuk Alpine.js Perusahaan Data
window.perusahaanData = function(config) {
    return {
        search: config.search || '',
        perPage: config.perPage || 10,
        statusFilter: config.statusFilter || '',
        loading: false,
        total: config.total || 0,
        from: config.from || 0,
        to: config.to || 0,
        routeUrl: config.routeUrl || '',

        init() {
            // Handle pagination clicks
            document.addEventListener('click', (e) => {
                if (e.target.closest('.pagination a')) {
                    e.preventDefault();
                    const url = e.target.closest('a').href;
                    this.fetchDataFromUrl(url);
                }
            });
        },

        setStatus(status) {
            this.statusFilter = status;
            this.fetchData();
        },

        fetchData(page = 1) {
            const url = new URL(this.routeUrl);
            url.searchParams.set('search', this.search);
            url.searchParams.set('per_page', this.perPage);
            url.searchParams.set('status', this.statusFilter);
            url.searchParams.set('page', page);
            this.fetchDataFromUrl(url.toString());
        },

        async fetchDataFromUrl(url) {
            this.loading = true;

            try {
                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                });

                const data = await response.json();

                document.getElementById('table-content').innerHTML = data.html;
                document.getElementById('pagination-content').innerHTML = data.pagination;

                this.total = data.total;
                this.from = data.from || 0;
                this.to = data.to || 0;

                // Update URL without reload
                window.history.pushState({}, '', url);
            } catch (error) {
                console.error('Error fetching data:', error);
            } finally {
                this.loading = false;
            }
        }
    }
}

// Dropdown functionality
document.addEventListener('DOMContentLoaded', function() {
    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdown');
        if (dropdown && !dropdown.contains(event.target)) {
            dropdown.removeAttribute('open');
        }
    });
});
