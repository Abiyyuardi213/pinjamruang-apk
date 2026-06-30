const pageCache = new Map();
const carouselTimers = new Set();

function clearCarouselTimers() {
    carouselTimers.forEach((timer) => window.clearInterval(timer));
    carouselTimers.clear();
}

function getPageTransition() {
    return document.querySelector('#page-transition');
}

function initReveal(root = document) {
    const revealItems = root.querySelectorAll('[data-reveal]');

    if (revealItems.length === 0) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.12,
            rootMargin: '0px 0px -24px 0px',
        },
    );

    revealItems.forEach((item, index) => {
        item.style.transitionDelay = `${Math.min(index * 12, 84)}ms`;
        observer.observe(item);
    });
}

function isInternalPageLink(link) {
    const href = link.getAttribute('href');

    if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) {
        return false;
    }

    if (link.getAttribute('target') === '_blank') {
        return false;
    }

    const destination = new URL(link.href, window.location.href);
    const current = new URL(window.location.href);
    const isSameOrigin = destination.origin === current.origin;
    const isSamePageHash = destination.pathname === current.pathname && destination.search === current.search && destination.hash;

    return isSameOrigin && !isSamePageHash && destination.href !== current.href;
}

async function fetchPage(url) {
    const key = url.toString();

    if (pageCache.has(key)) {
        return pageCache.get(key);
    }

    const response = await fetch(key, {
        headers: {
            'X-Requested-With': 'fetch',
        },
    });

    if (!response.ok) {
        throw new Error(`Failed to load ${key}`);
    }

    const html = await response.text();
    pageCache.set(key, html);
    return html;
}

function prefetchPage(url) {
    fetchPage(url).catch(() => {
        pageCache.delete(url.toString());
    });
}

async function navigateTo(url, shouldPushState = true) {
    const pageTransition = getPageTransition();

    if (!pageTransition) {
        window.location.href = url.href;
        return;
    }

    pageTransition.classList.remove('is-ready');
    pageTransition.classList.add('is-leaving');

    try {
        const [html] = await Promise.all([
            fetchPage(url),
            new Promise((resolve) => window.setTimeout(resolve, 90)),
        ]);

        const nextDocument = new DOMParser().parseFromString(html, 'text/html');
        const nextBody = nextDocument.body;
        const nextTitle = nextDocument.querySelector('title')?.textContent;

        if (!nextBody) {
            throw new Error('Missing body');
        }

        clearCarouselTimers();
        document.body.innerHTML = nextBody.innerHTML;

        if (nextTitle) {
            document.title = nextTitle;
        }

        if (shouldPushState) {
            window.history.pushState({}, '', url.href);
        }

        window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
        initPage();
    } catch (error) {
        window.location.href = url.href;
    }
}

function initPage() {
    const pageTransition = getPageTransition();

    if (pageTransition) {
        pageTransition.classList.remove('is-leaving');
        requestAnimationFrame(() => {
            pageTransition.classList.add('is-ready');
        });
    }

    initReveal();

    document.querySelectorAll('a[href]').forEach((link) => {
        if (link.dataset.fastNavBound === 'true') {
            return;
        }

        link.dataset.fastNavBound = 'true';

        if (isInternalPageLink(link)) {
            const destination = new URL(link.href, window.location.href);
            link.addEventListener('mouseenter', () => prefetchPage(destination), { passive: true });
            link.addEventListener('focus', () => prefetchPage(destination), { passive: true });
        }

        link.addEventListener('click', (event) => {
            if (event.defaultPrevented || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey || !isInternalPageLink(link)) {
                return;
            }

            event.preventDefault();
            navigateTo(new URL(link.href, window.location.href));
        });
    });

    const navLinks = [...document.querySelectorAll('header a[href]')]
        .filter(isInternalPageLink)
        .slice(0, 5);

    window.requestIdleCallback?.(() => {
        navLinks.forEach((link) => prefetchPage(new URL(link.href, window.location.href)));
    });

    initShowcaseSlider();
    initFeatureCarousels();
}

function initShowcaseSlider() {
    const slider = document.querySelector('[data-showcase-slider]');

    if (!slider || slider.dataset.sliderReady === 'true') {
        return;
    }

    const track = slider.querySelector('[data-showcase-track]');
    const slides = track ? [...track.children] : [];
    const previousButton = slider.querySelector('[data-showcase-prev]');
    const nextButton = slider.querySelector('[data-showcase-next]');
    const dots = [...slider.querySelectorAll('[data-showcase-dot]')];
    let activeIndex = 0;

    if (!track || slides.length === 0) {
        return;
    }

    slider.dataset.sliderReady = 'true';

    const render = () => {
        track.style.transform = `translateX(-${activeIndex * 100}%)`;
        slider.dataset.activeSlide = String(activeIndex);

        dots.forEach((dot, index) => {
            const isActive = index === activeIndex;
            dot.className = isActive
                ? 'h-2.5 w-8 rounded-full bg-slate-950 transition-all duration-300'
                : 'h-2.5 w-2.5 rounded-full bg-slate-300 transition-all duration-300';
            dot.setAttribute('aria-current', isActive ? 'true' : 'false');
        });
    };

    const goTo = (index) => {
        activeIndex = (index + slides.length) % slides.length;
        render();
    };

    previousButton?.addEventListener('click', () => goTo(activeIndex - 1));
    nextButton?.addEventListener('click', () => goTo(activeIndex + 1));
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => goTo(index));
    });

    render();
}

function initFeatureCarousels() {
    document.querySelectorAll('[data-feature-carousel]').forEach((carousel) => {
        if (carousel.dataset.carouselReady === 'true') {
            return;
        }

        const track = carousel.querySelector('[data-feature-carousel-track]');
        const slides = track ? [...track.children] : [];
        const dots = [...carousel.querySelectorAll('[data-feature-carousel-dot]')];
        let activeIndex = 0;

        if (!track || slides.length < 2) {
            return;
        }

        carousel.dataset.carouselReady = 'true';

        const render = () => {
            track.style.transform = `translateX(-${activeIndex * 100}%)`;

            dots.forEach((dot, index) => {
                const isActive = index === activeIndex;
                dot.className = isActive
                    ? 'h-1.5 w-6 rounded-full bg-slate-950/80 transition-all duration-300'
                    : 'h-1.5 w-1.5 rounded-full bg-slate-950/25 transition-all duration-300';
            });
        };

        const timer = window.setInterval(() => {
            if (!document.body.contains(carousel) || document.hidden) {
                return;
            }

            activeIndex = (activeIndex + 1) % slides.length;
            render();
        }, 2000);

        carouselTimers.add(timer);
        render();
    });
}

window.addEventListener('popstate', () => {
    navigateTo(new URL(window.location.href), false);
});

window.addEventListener('pageshow', initPage);
