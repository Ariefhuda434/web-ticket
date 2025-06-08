
<section
id="tickets"
class="relative  max-w-screen mx-auto overflow-hidden bg-pistachio/60 backdrop-blur-md rounded-xl"
x-data="ticketApp()"
>
<svg xmlns="http://www.w3.org/2000/svg" class="-mt-[  rem] " viewBox="0 0 1440 320"><path fill="#FFFFFF" fill-opacity="1" d="M0,256L8.6,229.3C17.1,203,34,149,51,133.3C68.6,117,86,139,103,165.3C120,192,137,224,154,234.7C171.4,245,189,235,206,224C222.9,213,240,203,257,181.3C274.3,160,291,128,309,106.7C325.7,85,343,75,360,96C377.1,117,394,171,411,176C428.6,181,446,139,463,128C480,117,497,139,514,133.3C531.4,128,549,96,566,106.7C582.9,117,600,171,617,160C634.3,149,651,75,669,48C685.7,21,703,43,720,69.3C737.1,96,754,128,771,149.3C788.6,171,806,181,823,170.7C840,160,857,128,874,117.3C891.4,107,909,117,926,112C942.9,107,960,85,977,90.7C994.3,96,1011,128,1029,138.7C1045.7,149,1063,139,1080,144C1097.1,149,1114,171,1131,186.7C1148.6,203,1166,213,1183,197.3C1200,181,1217,139,1234,122.7C1251.4,107,1269,117,1286,112C1302.9,107,1320,85,1337,90.7C1354.3,96,1371,128,1389,122.7C1405.7,117,1423,75,1431,53.3L1440,32L1440,0L1431.4,0C1422.9,0,1406,0,1389,0C1371.4,0,1354,0,1337,0C1320,0,1303,0,1286,0C1268.6,0,1251,0,1234,0C1217.1,0,1200,0,1183,0C1165.7,0,1149,0,1131,0C1114.3,0,1097,0,1080,0C1062.9,0,1046,0,1029,0C1011.4,0,994,0,977,0C960,0,943,0,926,0C908.6,0,891,0,874,0C857.1,0,840,0,823,0C805.7,0,789,0,771,0C754.3,0,737,0,720,0C702.9,0,686,0,669,0C651.4,0,634,0,617,0C600,0,583,0,566,0C548.6,0,531,0,514,0C497.1,0,480,0,463,0C445.7,0,429,0,411,0C394.3,0,377,0,360,0C342.9,0,326,0,309,0C291.4,0,274,0,257,0C240,0,223,0,206,0C188.6,0,171,0,154,0C137.1,0,120,0,103,0C85.7,0,69,0,51,0C34.3,0,17,0,9,0L0,0Z"></path></svg>   
<div class="-mt-[10rem]">
<h2 class="text-indigoCustom text-5xl font-extrabold mb-12 font-marker text-center">
    Pilih Tiketmu
  </h2>
  <div class="grid grid-cols-1 gap-8 max-w-4xl mx-auto">
    <template x-for="ticket in tickets" :key="ticket.id">
      <div
        class="flex justify-between items-center rounded-3xl border-2 p-6 bg-white/80 border-pistachio shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform cursor-pointer"
      >
        <div class="flex items-center gap-6">
          <div class="w-20 h-20 text-indigoCustom">
            <img :src="ticket.image" alt="ticket icon" class="object-contain w-full h-full" />
          </div>
          <div class="flex flex-col space-y-1">
            <h3 class="text-2xl font-bold text-indigoCustom" x-text="ticket.name"></h3>
            <p class="text-indigoCustom text-sm md:text-base font-light" x-text="ticket.description"></p>
            <p class="text-xs text-gray-500 italic" x-text="ticket.deskripsi"></p>
          </div>
        </div>
        <div class="flex flex-col items-end justify-between h-full">
          <p class="font-semibold text-lg text-orchid mb-4" x-text="formatCurrency(ticket.price)"></p>
          <button
            @click="addToCart(ticket)"
            class="py-2 px-5 rounded-xl font-semibold text-white bg-indigoCustom hover:bg-teal-700 focus:bg-teal-800 items-center transition-colors"
          >
            Tambah ke Keranjang
          </button>
        </div>
      </div>
    </template>
  </div>

  <!-- Keranjang -->
  <section class="mt-20 max-w-4xl mx-auto bg-white rounded-xl p-8 shadow-lg">
    <h2 class="text-3xl font-extrabold text-indigoCustom mb-6 text-center">
      Keranjang Pembelian
    </h2>

    <template x-if="cart.length === 0">
      <p class="text-center text-lg text-indigoCustom font-light">
        Keranjang kosong. Silakan pilih tiket terlebih dahulu.
      </p>
    </template>

    <template x-if="cart.length > 0">
      <div class="space-y-4">
        <template x-for="(item, index) in cart" :key="item.id">
          <div
            class="flex justify-between items-center border border-indigoCustom/30 rounded-lg p-4 shadow-sm"
          >
            <div>
              <h3 class="text-xl font-semibold text-indigoCustom" x-text="item.name"></h3>
              <p class="text-indigoCustom font-light" x-text="formatCurrency(item.price)"></p>
            </div>
            <button
              @click="removeFromCart(index)"
              class="text-red-600 hover:text-red-900 text-2xl"
              aria-label="Hapus dari keranjang"
              title="Hapus"
            >
              &times;
            </button>
          </div>
        </template>

        <div class="text-indigoCustom font-bold text-right text-xl border-t border-indigoCustom/40 pt-4">
          Total: <span x-text="formatCurrency(cartTotal())"></span>
        </div>
    <button  onclick="document.getElementById('checkout').classList.remove('hidden')"
    type="button" class="bg-indigoCustom  hover:bg-teal-700 focus:bg-teal-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-teal-300 inline-flex items-center justify-center space-x-2">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h11l-1.5-7M16 17a2 2 0 11-4 0"/>
  </svg>
  <span>Checkout</span>
</button>



      </div>
    </template>
  </section>
  </div>
</section>

<script>
  function ticketApp() {
    return {
      tickets: [
        {
          id: 1,
          name: "Single",
          price: 25000,
          description: "Untuk 1 orang",
          deskripsi: "Nikmati pengalaman seru bersama teman & keluarga!",
          image: "{{ asset('build/images/icons8-ticket-80.png') }}",
        },
        {
          id: 2,
          name: "Couple",
          price: 45000,
          description: "Untuk 2 orang",
          deskripsi: "Tiket berdua yang bisa kamu beli bareng pasangan / temen kamu !",
          image: "{{ asset('build/images/icons8-ticket-80.png') }}",
          
        },
        {
          id: 3,
          name: "Mates",
          price: 90000,
          description: "Untuk 4 orang",
          deskripsi: "4 tiket yang bisa dibeli bareng temen - temen deket kamu",
          image: "{{ asset('build/images/icons8-ticket-80.png') }}",
          
        },
        {
          id: 4,
          name: "Group",
          price: 135000,
          description: "Untuk 6 orang",
          deskripsi: "6 tiket yang cocok dibeli bareng teman - teman di circle kamu",
          image: "{{ asset('build/images/icons8-ticket-80.png') }}",
        },
        {
          id: 5,
          name: "Party",
          price: 175000,
          description: "Untuk 8 orang",
          deskripsi:
            "Tiket ramean yang isinya 8 tiket dan oke banget buat dibeli bareng teman - teman party kamu !",
          image: "{{ asset('build/images/icons8-ticket-80.png') }}",
          
          },
        {
          id: 6,
          name: "Sapma Family",
          price: 325000,
          description: "Untuk 15 orang",
          deskripsi: "Tiket khusus kader SAPMA PP yang isisnya 15 tiket ! (per-komisariat)",
          image: "{{ asset('build/images/icons8-ticket-80.png') }}",
          
        },
      ],
      cart: [],
      formatCurrency(value) {
        return new Intl.NumberFormat("id-ID", {
          style: "currency",
          currency: "IDR",
          minimumFractionDigits: 0,
        }).format(value);
      },
      addToCart(ticket) {
        // Kalau sudah ada, jangan tambah lagi
        if (!this.cart.find((item) => item.id === ticket.id)) {
          this.cart.push({ ...ticket });
        }
      },
      removeFromCart(index) {
        this.cart.splice(index, 1);
      },
      cartTotal() {
        return this.cart.reduce((total, item) => total + item.price, 0);
      },
    };
  }
</script>
