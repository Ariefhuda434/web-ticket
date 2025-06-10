<section
id="tickets"
class="relative max-w-screen mx-auto  mt-10 bg-pistachio/60 backdrop-blur-md rounded-xl"
x-data="ticketApp()"
x-init="init()"
>
<div class="-mt-[5rem] ">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" class="z-20" fill-opacity="1" d="M0,192L8.6,208C17.1,224,34,256,51,240C68.6,224,86,160,103,149.3C120,139,137,181,154,186.7C171.4,192,189,160,206,170.7C222.9,181,240,235,257,229.3C274.3,224,291,160,309,160C325.7,160,343,224,360,218.7C377.1,213,394,139,411,96C428.6,53,446,43,463,64C480,85,497,139,514,138.7C531.4,139,549,85,566,101.3C582.9,117,600,203,617,229.3C634.3,256,651,224,669,181.3C685.7,139,703,85,720,96C737.1,107,754,181,771,213.3C788.6,245,806,235,823,208C840,181,857,139,874,149.3C891.4,160,909,224,926,224C942.9,224,960,160,977,133.3C994.3,107,1011,117,1029,112C1045.7,107,1063,85,1080,85.3C1097.1,85,1114,107,1131,117.3C1148.6,128,1166,128,1183,154.7C1200,181,1217,235,1234,256C1251.4,277,1269,267,1286,250.7C1302.9,235,1320,213,1337,202.7C1354.3,192,1371,192,1389,192C1405.7,192,1423,192,1431,192L1440,192L1440,0L1431.4,0C1422.9,0,1406,0,1389,0C1371.4,0,1354,0,1337,0C1320,0,1303,0,1286,0C1268.6,0,1251,0,1234,0C1217.1,0,1200,0,1183,0C1165.7,0,1149,0,1131,0C1114.3,0,1097,0,1080,0C1062.9,0,1046,0,1029,0C1011.4,0,994,0,977,0C960,0,943,0,926,0C908.6,0,891,0,874,0C857.1,0,840,0,823,0C805.7,0,789,0,771,0C754.3,0,737,0,720,0C702.9,0,686,0,669,0C651.4,0,634,0,617,0C600,0,583,0,566,0C548.6,0,531,0,514,0C497.1,0,480,0,463,0C445.7,0,429,0,411,0C394.3,0,377,0,360,0C342.9,0,326,0,309,0C291.4,0,274,0,257,0C240,0,223,0,206,0C188.6,0,171,0,154,0C137.1,0,120,0,103,0C85.7,0,69,0,51,0C34.3,0,17,0,9,0L0,0Z"></path></svg>
</div>
  <!-- ...SVG dan header tetap sama... -->

  
<div class="-mt-[10rem]">
    <h2
      class="text-indigoCustom text-5xl font-extrabold mb-12 mt-[10rem] lg:mt-[-10rem] md:mt-[-10rem] font-marker text-center"
    >
      Pilih Tiketmu
    </h2>
    <div class="grid grid-cols-1 gap-8 max-w-4xl mx-auto">
        <template x-for="ticket in tickets" :key="ticket.id">
       <div
  class="flex flex-col md:flex-row justify-between items-center md:items-center rounded-3xl border-2 p-6 bg-white/80 border-pistachio shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform cursor-pointer space-y-4 md:space-y-0 md:space-x-6 text-center md:text-left"
>
  <!-- Gambar -->
  <div class="flex-shrink-0 mx-auto md:mx-0 w-20 h-20 md:w-24 md:h-24 text-indigoCustom flex items-center justify-center rounded-lg">
    <img
      :src="ticket.image"
      alt="ticket icon"
      class="object-contain w-full h-full transition-all duration-300"
    />
  </div>

  <!-- Deskripsi -->
  <div class="flex flex-col flex-1 space-y-1">
    <h3 class="text-2xl font-bold text-indigoCustom" x-text="ticket.name"></h3>
    <p class="text-indigoCustom text-sm md:text-base font-light" x-text="ticket.description"></p>
    <p class="text-xs text-gray-500 italic" x-text="ticket.deskripsi"></p>
  </div>

  <!-- Harga + Button -->
  <div class="flex flex-col items-center md:items-end space-y-2 md:space-y-4 w-full md:w-auto">
    <p class="font-semibold text-lg text-orchid" x-text="formatCurrency(ticket.price)"></p>
    <button
      @click="addToCart(ticket)"
      class="py-2 px-5 rounded-xl font-semibold text-white bg-indigoCustom hover:bg-teal-700 focus:bg-teal-800 w-full md:w-auto transition-colors"
    >
      Tambah ke Keranjang
    </button>
  </div>
</div>


    </template>
    </div>

    <!-- Keranjang -->
    <section
      id="keranjang"
      class="mt-20 max-w-4xl mx-auto bg-white rounded-xl p-8 shadow-lg"
    >
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

          <div
            class="text-indigoCustom font-bold text-right text-xl border-t border-indigoCustom/40 pt-4"
          >
            Total: <span x-text="formatCurrency(cartTotal())"></span>
          </div>

          <button
            id="btnCheckout"
            class="bg-indigoCustom hover:bg-teal-700 focus:bg-teal-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-teal-300 inline-flex items-center justify-center space-x-2"
            onclick="document.getElementById('checkout').classList.remove('hidden')"
            type="button"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h11l-1.5-7M16 17a2 2 0 11-4 0"
              />
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
    document.getElementById('btnCheckout').addEventListener('click', () => {
      const totalCart = window.ticketAppInstance?.cartTotal() || 0;

      const checkoutComponent = document.getElementById('checkout').__x.$data;
      checkoutComponent.openCheckout(totalCart);
    });

    return {
       tickets: [
        {
          id: 1,
          name: "Single",
          price: 30000,
          description: "Untuk 1 orang",
          deskripsi: "Nikmati pengalaman seru bersama teman & keluarga!",
          image: "/images/icons8-ticket-80.png",
        },
        {
          id: 2,
          name: "Couple",
          price: 45000,
          description: "Untuk 2 orang",
          deskripsi: "Tiket berdua yang bisa kamu beli bareng pasangan / temen kamu !",
          image: "{{ asset('images/icons8-ticket-80.png') }}",
          
        },
        {
          id: 3,
          name: "Mates",
          price: 90000,
          description: "Untuk 4 orang",
          deskripsi: "4 tiket yang bisa dibeli bareng temen - temen deket kamu",
          image: "{{ asset('images/icons8-ticket-80.png') }}",
          
        },
        {
          id: 4,
          name: "Group",
          price: 135000,
          description: "Untuk 6 orang",
          deskripsi: "6 tiket yang cocok dibeli bareng teman - teman di circle kamu",
          image: "{{ asset('images/icons8-ticket-80.png') }}",
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
          image: "{{ asset('images/icons8-ticket-80.png') }}",
          
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
      cartTotal() {
        // Jumlah harga semua tiket dalam cart, quantity diabaikan karena 1 saja tiap tiket
        return this.cart.reduce((sum, item) => sum + item.price, 0);
      },
      addToCart(ticket) {
        // Kalau tiket sudah ada di keranjang, jangan tambah lagi
        const found = this.cart.find((item) => item.id === ticket.id);
        if (!found) {
          this.cart.push({ ...ticket });
        }
      },
      removeFromCart(index) {
        this.cart.splice(index, 1);
      },
      init() {
        // Simpan instance ke window supaya bisa dipakai global (misal di event btnCheckout)
        window.ticketAppInstance = this;
      },
    };
  }
</script>
