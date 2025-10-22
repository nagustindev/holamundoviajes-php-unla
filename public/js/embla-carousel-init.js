document.addEventListener('DOMContentLoaded', function() {
    const emblaNode = document.querySelector('.embla');
    if (!emblaNode) return;

    const viewportNode = emblaNode.querySelector('.embla__viewport');

    // Configuración del carousel
    const options = {
        align: 'start',
        loop: true,
        skipSnaps: false,
    };

    // Configuración del autoplay
    const autoplayOptions = {
        delay: 4000,
        stopOnInteraction: false,
        stopOnMouseEnter: true,
        stopOnFocusIn: true
    };

    // Inicializar Embla con autoplay
    const emblaApi = EmblaCarousel(viewportNode, options, [EmblaCarouselAutoplay(autoplayOptions)]);

    // Botones de navegación
    const prevButton = emblaNode.querySelector('.embla__button--prev');
    const nextButton = emblaNode.querySelector('.embla__button--next');

    if (prevButton && nextButton) {
        const onPrevButtonClick = () => {
            emblaApi.scrollPrev();
        };

        const onNextButtonClick = () => {
            emblaApi.scrollNext();
        };

        prevButton.addEventListener('click', onPrevButtonClick);
        nextButton.addEventListener('click', onNextButtonClick);
    }

    // Dots de paginación
    const dotsNode = emblaNode.querySelector('.embla__dots');

    if (dotsNode) {
        const addDotBtnsAndClickHandlers = (emblaApi, dotsNode) => {
            let dotNodes = [];

            const addDotBtnsWithClickHandlers = () => {
                dotsNode.innerHTML = emblaApi
                    .scrollSnapList()
                    .map(() => '<button class="embla__dot w-3 h-3 rounded-full bg-gray-300 border-none cursor-pointer transition-colors duration-200" type="button"></button>')
                    .join('');

                const scrollTo = (index) => {
                    emblaApi.scrollTo(index);
                };

                dotNodes = Array.from(dotsNode.querySelectorAll('.embla__dot'));
                dotNodes.forEach((dotNode, index) => {
                    dotNode.addEventListener('click', () => scrollTo(index));
                });
            };

            const toggleDotBtnsActive = () => {
                const previous = emblaApi.previousScrollSnap();
                const selected = emblaApi.selectedScrollSnap();
                if (dotNodes[previous]) {
                    dotNodes[previous].classList.remove('bg-blue-500');
                    dotNodes[previous].classList.add('bg-gray-300');
                }
                if (dotNodes[selected]) {
                    dotNodes[selected].classList.remove('bg-gray-300');
                    dotNodes[selected].classList.add('bg-blue-500');
                }
            };

            addDotBtnsWithClickHandlers();
            toggleDotBtnsActive();

            return toggleDotBtnsActive;
        };

        const toggleDotBtnsState = addDotBtnsAndClickHandlers(emblaApi, dotsNode);
        emblaApi.on('select', toggleDotBtnsState);
        emblaApi.on('init', toggleDotBtnsState);
    }
});