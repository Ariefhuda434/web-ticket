<!-- Modal Checkout -->
<section
  id="checkout"
  class="fixed inset-0 bg-indigoCustom/50 hidden z-50 flex items-start justify-center overflow-y-auto py-10 px-4"
  x-data="checkoutForm()"
  @click.self="closeCheckout()"
  x-cloak
>
  <div
    class="bg-white rounded-3xl shadow-2xl border-2 border-pistachio/50 w-full max-w-3xl p-8 relative"
    style="margin-top: 20px;"
  >
    <h2 class="text-indigoCustom text-2xl font-extrabold mb-6 text-center">Checkout & Pembayaran</h2>

    <form action="{{ route('transactions.store') }}" method="POST" class="space-y-4">
      @csrf
      <input type="hidden" name="total"  x-bind:value="cartTotal()">

      <div>
        <label class="block text-sm font-semibold text-indigoCustom mb-1">Email</label>
        <input type="email" name="email" x-model="email" required
          placeholder="Masukkan email Anda"
          class="w-full px-4 py-3 rounded-xl border-2 border-indigoCustom/30 focus:ring-indigoCustom outline-none" />
      </div>

      <div>
        <label class="block text-sm font-semibold text-indigoCustom mb-1">No. HP</label>
        <input type="tel" name="phone" x-model="phone" required
          placeholder="Masukkan nomor handphone"
          class="w-full px-4 py-3 rounded-xl border-2 border-indigoCustom/30 focus:ring-indigoCustom outline-none" />
      </div>

      <div>
        <label class="block text-sm font-semibold text-indigoCustom mb-1">Nama</label>
        <input type="text" name="name" x-model="name" required
          placeholder="Masukkan nama lengkap"
          class="w-full px-4 py-3 rounded-xl border-2 border-indigoCustom/30 focus:ring-indigoCustom outline-none" />
      </div>

      <div>
        <label class="block text-sm font-semibold text-indigoCustom mb-1">NIK</label>
        <input type="text" name="nik" x-model="nik" required
          placeholder="Masukkan NIK"
          class="w-full px-4 py-3 rounded-xl border-2 border-indigoCustom/30 focus:ring-indigoCustom outline-none" />
      </div>

 <div>
    <label class="block text-sm font-semibold text-indigoCustom mb-1">Metode Pembayaran</label>
    <select name="method" x-model="method" required
      class="w-full px-4 py-3 rounded-xl border-2 border-indigoCustom/30 focus:ring-indigoCustom outline-none">
      <option value="">Pilih Metode Pembayaran</option>
      <option value="bank">Transfer Bank</option>
      <option value="dana">DANA</option>
      <option value="ewallet">E-Wallet</option>
    </select>
  </div>

  <div x-show="method === 'bank'" x-transition>
    <label class="flex items-center space-x-2 cursor-pointer">
      <input type="radio" name="bank" value="Mandiri" x-model="bank" :required="method === 'bank'" class="cursor-pointer" />
      <span>Mandiri</span>
    </label>
    <label class="flex items-center space-x-2 cursor-pointer">
      <input type="radio" name="bank" value="BSI" x-model="bank" :required="method === 'bank'" class="cursor-pointer" />
      <span>BSI</span>
    </label>
  </div>

  <template x-if="method === 'bank' && bank === 'Mandiri'">
    <div class="mt-4 p-3 bg-indigoCustom/10 rounded-xl border border-indigoCustom/50">
      <p class="font-semibold text-indigoCustom">Nomor Rekening Mandiri:</p>
      <p class="text-indigoCustom text-md">1060019732968 <br> Atas nama : Alya Shila Arrahmi</p>
    </div>
  </template>

  <template x-if="method === 'bank' && bank === 'BSI'">
    <div class="mt-4 p-3 bg-indigoCustom/10 rounded-xl border border-indigoCustom/50">
      <p class="font-semibold text-indigoCustom">Nomor Rekening BSI:</p>
      <p class="text-indigoCustom text-md">7221169594 <br>Atas nama : Alya Shila Arrahmi</p>
    </div>
  </template>

  <template x-if="method === 'dana'">
    <div class="mt-4 p-3 bg-indigoCustom/10 rounded-xl border border-indigoCustom/50">
      <p class="font-semibold text-indigoCustom">Nomor DANA:</p>
      <p class="text-indigoCustom text-md">081264638872 <br> Atas nama : Elisah</p>
    </div>
  </template>

  <template x-if="method === 'ewallet'">
    <div class="mt-4 p-3 bg-indigoCustom/10 rounded-xl border border-indigoCustom/50">
      <p class="font-semibold text-indigoCustom">Nomor E-Wallet (OVO/GoPay):</p>
      <p class="text-indigoCustom text-md">082168214521 <br> Atas nama : Alya Shila Arrahmi</p>
    </div>
  </template>
      <button type="submit"
        class="w-full py-3 px-6 rounded-xl bg-indigoCustom text-white font-bold hover:bg-indigo-700 transition">
        Proses Pembayaran
      </button>
    </form>

    <!-- Tombol Close -->
    <button
      @click="closeCheckout()"
      class="absolute top-4 right-4 text-indigoCustom text-3xl font-bold hover:text-red-500 transition"
      title="Tutup"
    >&times;</button>
  </div>
</section>

<script>

  function checkoutForm() {
    return {
      email: '',
      phone: '',
      name: '',
      nik: '',
      method: '',
      bank: '',

      openCheckout() {
        document.getElementById('checkout').classList.remove('hidden');
        document.body.style.overflow = 'hidden';  // disable scroll background
      },

      closeCheckout() {
        this.email = '';
        this.phone = '';
        this.name = '';
        this.nik = '';
        this.method = '';
        this.bank = '';
        document.getElementById('checkout').classList.add('hidden');
        document.body.style.overflow = '';  // enable scroll background
      }
    }
  }
</script>
