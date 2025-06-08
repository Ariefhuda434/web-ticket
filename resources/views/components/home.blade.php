  <section
    id="home"
    x-data="{ show: false }"
    x-init="setTimeout(() => show = true, 300)"
    class="relative bg-cover bg-center bg-no-repeat bg-fixed min-h-screen flex flex-col justify-center items-center text-pistachio px-6"
    style="background-image: url('{{ asset('build/images/sapmarame.jpg') }}');"
  >
    <div class="absolute inset-0 bg-indigoCustom/80 backdrop-blur-sm"></div>
    <div
      x-show="show"
      x-transition:enter="transition ease-out duration-1000"
      x-transition:enter-start="opacity-0 translate-y-12"
      x-transition:enter-end="opacity-100 translate-y-0"
      class="relative z-10 text-center max-w-4xl px-4"
    >
      <h1
        class="text-6xl md:text-8xl font-extrabold drop-shadow-2xl leading-tight mb-6 animate-float"
        style="font-family: 'Poppins', sans-serif;"
      >
        Festival Seni Budaya 2025
      </h1>
      <p class="mt-6 text-xl md:text-3xl drop-shadow-md tracking-wide font-light max-w-3xl mx-auto leading-relaxed">
        Rasakan keindahan kreativitas dan ekspresi dalam satu panggung yang memukau dan tak terlupakan.
      </p>
      <a
        href="#tickets"
        class="mt-12 inline-block px-10 py-4 border-2 border-peach rounded-lg text-peach font-semibold tracking-wide hover:bg-peach hover:text-indigoCustom transition-smooth shadow-lg"
      >
        🎟️ Beli Tiket Sekarang
      </a>
    </div>
  </section>