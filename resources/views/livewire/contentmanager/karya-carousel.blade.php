<div x-data="{            
    autoplayIntervalTime: 3000,
    slides: [                
        {
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
            imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',
            goto: '{{route('welcome')}}',
            goto_text: 'Cek Karya1',
            title: 'Front end developers',
            description: 'The architects of the digital world, constantly battling against their mortal enemy – browser compatibility.',           
        },                
        {                    
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',                    
            imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',
            goto: '{{route('welcome')}}',
            goto_text: 'Cek Karya2',
            title: 'Misal Thumbmnail/apalah',
            description: 'Because not all superheroes wear capes, some wear headphones and stare at terminal screens',            
        },                
        {                    
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',                    
            imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
            goto: '{{route('welcome')}}',
            goto_text: 'Cek Karya1',
            title: 'Misal Thumbmnail/apalah',
            description: 'Bebas disini',       
        },            
    ],            
    currentSlideIndex: 1,
    isPaused: false,
    autoplayInterval: null,
    
    // Move to the previous slide
    previous() {                
        if (this.currentSlideIndex > 1) {                    
            this.currentSlideIndex = this.currentSlideIndex - 1                
        } else {   
            // If it's the first slide, go to the last slide           
            this.currentSlideIndex = this.slides.length                
        }            
    },            
    
    // Move to the next slide
    next() {                
        if (this.currentSlideIndex < this.slides.length) {                    
            this.currentSlideIndex = this.currentSlideIndex + 1                
        } else {                 
            // If it's the last slide, go to the first slide    
            this.currentSlideIndex = 1                
        }            
    },    
    
    // Autoplay functionality to automatically go to next slide
    autoplay() {
        this.autoplayInterval = setInterval(() => {
            if (!this.isPaused) {
                this.next()
            }
        }, this.autoplayIntervalTime)
    },
    
    // Updates interval time for autoplay
    setAutoplayInterval(newIntervalTime) {
        clearInterval(this.autoplayInterval)
        this.autoplayIntervalTime = newIntervalTime
        this.autoplay()
    },    
    
    // Pause the autoplay
    pauseAutoplay() {
        clearInterval(this.autoplayInterval)
        this.isPaused = true
    },
    
    // Resume the autoplay
    resumeAutoplay() {
        this.isPaused = false
        this.autoplay()
    }
}" x-init="autoplay" class="relative w-full overflow-hidden">

    <!-- previous button -->
    <button type="button"
        class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
        aria-label="previous slide" x-on:click="previous()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
            class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </button>

    <!-- next button -->
    <button type="button"
        class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
        aria-label="next slide" x-on:click="next()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
            class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </button>

    <!-- slides -->
    <div class="relative min-h-[50svh] w-full">
        <template x-for="(slide, index) in slides">
            <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                x-transition.opacity.duration.1000ms>
                <!-- Title and description -->
                <div
                    class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-neutral-950/85 to-transparent px-16 py-12 text-center">
                    <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white"
                        x-text="slide.title" x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"></h3>
                    <p class="lg:w-1/2 w-full text-pretty text-sm text-neutral-300" x-text="slide.description"
                        x-bind:id="'slide' + (index + 1) + 'Description'"></p>

                    <!-- Button with transparent background -->
                    <a href="#" :href="slide.goto" class="mt-4 inline-block px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-neutral-900 transition-all duration-300" x-text="slide.goto_text"></a>
                </div>

                <img class="absolute w-full h-full inset-0 object-cover text-neutral-600 dark:text-neutral-300"
                    x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
            </div>
        </template>
    </div>

    <!-- Pause/Play Button -->
    <button type="button"
        class="absolute bottom-5 right-5 z-20 rounded-full text-neutral-300 opacity-50 transition hover:opacity-80 focus-visible:opacity-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white active:outline-offset-0"
        aria-label="pause carousel" x-on:click="isPaused ? resumeAutoplay() : pauseAutoplay()"
        x-bind:aria-pressed="isPaused">
        <svg x-cloak x-show="isPaused" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-7">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0  1 0 0 1.972l-11.54 6.347a1.125 1.125 0  1 0-1.667-.986V5.653Z" />
        </svg>
        <svg x-cloak x-show="!isPaused" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="size-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" />
        </svg>
    </button>

</div>
