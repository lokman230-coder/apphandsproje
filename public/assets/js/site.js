/**
 * Ahost One - Site JavaScript
 * Premium SaaS Platform
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // HEADER SCROLL EFFECT
    // ============================================
    const header = document.getElementById('siteHeader');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    
    // ============================================
    // MOBILE MENU
    // ============================================
    const mobileToggle = document.getElementById('mobileToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileClose = document.getElementById('mobileClose');
    
    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener('click', function() {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }
    
    if (mobileClose && mobileMenu) {
        mobileClose.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
    }
    
    // ============================================
    // DOMAIN CHECKER
    // ============================================
    const domainForm = document.querySelector('.domain-form');
    
    if (domainForm) {
        domainForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const input = this.querySelector('input[name="domain"]');
            const domain = input.value.trim();
            
            if (!domain) return;
            
            // Remove .com etc if entered
            const cleanDomain = domain.replace(/\.(com|net|org|io|com\.tr)$/i, '');
            
            try {
                const response = await fetch('?ajax=1', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `action=check_domain&domain=${cleanDomain}`
                });
                
                const data = await response.json();
                
                displayDomainResults(cleanDomain, data.results);
            } catch (error) {
                console.error('Domain check failed:', error);
            }
        });
    }
    
    function displayDomainResults(domain, results) {
        const resultsContainer = document.querySelector('.domain-results');
        if (!resultsContainer) return;
        
        let html = '';
        
        for (const [ext, available] of Object.entries(results)) {
            const price = available ? '₺89' : '-';
            const statusClass = available ? 'available' : 'taken';
            const statusText = available ? 'Müsait' : 'Alınmış';
            
            html += `
                <div class="domain-result ${statusClass}">
                    <div class="domain-name">${cleanDomain}${ext}</div>
                    <div class="domain-price">${price}</div>
                    <div style="font-size: 11px; color: ${available ? 'var(--success)' : 'var(--danger)'}; margin-top: 4px;">${statusText}</div>
                </div>
            `;
        }
        
        resultsContainer.innerHTML = html;
    }
    
    // ============================================
    // ANIMATE ON SCROLL
    // ============================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fadeInUp');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.feature-card, .pricing-card').forEach(el => {
        el.style.opacity = '0';
        observer.observe(el);
    });
    
    // ============================================
    // CART FUNCTIONS
    // ============================================
    window.addToCart = async function(productId) {
        try {
            const response = await fetch('?ajax=1', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `action=add_to_cart&product_id=${productId}`
            });
            
            const data = await response.json();
            
            if (data.success) {
                updateCartCount(data.count);
                showToast('Ürün sepete eklendi!');
            }
        } catch (error) {
            console.error('Add to cart failed:', error);
        }
    };
    
    function updateCartCount(count) {
        const cartIcons = document.querySelectorAll('.cart-count');
        cartIcons.forEach(icon => {
            if (count > 0) {
                icon.textContent = count;
                icon.style.display = 'flex';
            } else {
                icon.style.display = 'none';
            }
        });
    }
    
    // ============================================
    // TOAST NOTIFICATIONS
    // ============================================
    window.showToast = function(message, type = 'success') {
        const container = document.getElementById('toastContainer') || createToastContainer();
        
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
        `;
        
        container.appendChild(toast);
        
        setTimeout(() => toast.classList.add('show'), 10);
        
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    };
    
    function createToastContainer() {
        const container = document.createElement('div');
        container.id = 'toastContainer';
        document.body.appendChild(container);
        return container;
    }
    
    // ============================================
    // THEME SWITCHER
    // ============================================
    window.switchTheme = function(theme) {
        window.location.href = '?theme=' + theme;
    };
});
