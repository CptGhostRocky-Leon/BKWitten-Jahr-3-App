@props([
    'src',
    'alt' => '',
])

<div
    x-data="{
        loaded: false,
        loadingStarted: false
    }"
    x-init="
        const observer = new IntersectionObserver((entries) => {
            if (!entries[0].isIntersecting || loadingStarted) {
                return;
            }

            loadingStarted = true;
            observer.disconnect();

            const image = new Image();

            image.decoding = 'async';

            image.onload = () => {
                $refs.image.src = image.src;

                requestAnimationFrame(() => {
                    loaded = true;
                });
            };

            image.onerror = () => {
                loaded = true;
            };

            image.src = @js($src);
        });

        observer.observe($el);
    "
    class="relative mt-6 min-h-[20rem] w-full"
>
    <div
        x-show="!loaded"
        class="absolute inset-0 flex items-start justify-center pt-4"
        aria-hidden="true"
    >
        <div class="loading-spinner"></div>
    </div>

    <img
        x-ref="image"
        src=""
        alt="{{ $alt }}"
        decoding="async"
        class="h-auto max-w-full rounded-lg opacity-0 transition-opacity duration-200"
        x-bind:class="{ 'opacity-100': loaded }"
    >
</div>

<style>
    .loading-spinner {
        width: 32px;
        height: 32px;
        border: 4px solid #e2e8f0;
        border-top-color: #334155;
        border-radius: 50%;
        animation: loading-spin 0.8s linear infinite;
        will-change: transform;
    }

    @keyframes loading-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>