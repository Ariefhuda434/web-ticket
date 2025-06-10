
  <nav
    id="navbar"
    class="bg-indigoCustom/90 backdrop-blur-md fixed w-full z-50 transition-all duration-300 shadow-soft-lg"
  >
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex justify-between items-center py-3 mt-2">
        <span class="font-extrabold flex text-3xl text-pistachio uppercase tracking-wide drop-shadow-lg select-none cursor-default"><span><img src="{{ asset('build/images/exmasi-removebg-preview.png') }}" alt="" srcset="" class="h-[4rem] -mt-3.5 mr-3"></span> exmasi</span>
        <div class="hidden md:flex items-center space-x-10 font-semibold text-pistachio">
          <a href="#home" class="hover:text-peach transition-smooth">Beranda</a>
          <a href="#event-info" class="hover:text-peach transition-smooth">Info Acara</a>
          <a href="#features" class="hover:text-peach transition-smooth">Keunggulan</a>
          <a href="#tickets" class="hover:text-peach transition-smooth">Tiket</a>
         
          <div class="relative cursor-pointer" @click="toggleCart()" title="Lihat Keranjang">
            <i class="fa-solid fa-cart-shopping text-peach text-2xl"></i>
            <span
              x-text="cartCount()"
              class="absolute -top-2 -right-3 bg-peach text-indigoCustom text-xs rounded-full px-2 font-semibold select-none"
              x-show="cartCount() > 0"
              x-transition
            ></span>
          </div>
        </div>
        <button class="md:hidden text-peach focus:outline-none" @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Toggle menu">
          <i class="fa-solid fa-bars text-3xl"></i>
        </button>
      </div>
      <div
        x-show="mobileMenuOpen"
        @click.away="mobileMenuOpen = false"
        class="md:hidden bg-indigoCustom/90 backdrop-blur  py-3 space-y-3 w-screen -ml-[1.5rem] pl-5 font-semibold text-pistachio text-lg"
        x-transition
      >
        <a href="#home" @click="mobileMenuOpen = false" class="block hover:text-peach transition-smooth">Beranda</a>
        <a href="#event-info" @click="mobileMenuOpen = false" class="block hover:text-peach transition-smooth">Info Acara</a>
        <a href="#features" @click="mobileMenuOpen = false" class="block hover:text-peach transition-smooth">Keunggulan</a>
        <a href="#tickets" @click="mobileMenuOpen = false" class="block hover:text-peach transition-smooth">Tiket</a>

      </div>
    </div>
  </nav>
