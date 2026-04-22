@extends('layouts.store')

@section('title', 'Beli ' . $product->name . ' - LumYena Store')

@section('content')
@php $initialPrice = $product->variations->count() > 0 ? 'Pilih Nominal' : $product->formatted_price; @endphp
<div class="max-w-4xl mx-auto pb-24 lg:pb-10" x-data="{ formattedPrice: @js($initialPrice) }"> <!-- Extra padding bottom for sticky mobile button -->

    <!-- Header Product -->
    <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] overflow-hidden mb-8 lg:flex lg:items-center">
        <!-- Banner Image Desktop/Tablet -->
        <div class="w-full lg:w-1/3 h-48 lg:h-56 bg-lumyena-light p-4 flex justify-center items-center">
            <img src="{{ asset('images/products/' . ($product->image ?? 'placeholder.png')) }}" alt="{{ $product->name }}" class="object-contain h-full drop-shadow-lg scale-110" onerror="this.src='https://placehold.co/400x400/FFB6C1/FF69B4?text=Top+Up'">
        </div>
        
        <!-- Info Content -->
        <div class="p-6 lg:w-2/3 border-t-4 lg:border-t-0 lg:border-l-4 border-lumyena-secondary">
            <span class="inline-block bg-[#FFD700] text-yellow-900 text-xs font-extrabold px-3 py-1 rounded-full border-2 border-yellow-500 mb-2 shadow-[0_2px_0_#DAA520]">
                {{ $product->category->name }}
            </span>
            <h1 class="text-3xl font-black text-lumyena-primary mb-2 drop-shadow-sm">{{ $product->name }}</h1>
            <p class="text-sm text-lumyena-text font-semibold leading-relaxed mb-4">
                {{ $product->description }}
            </p>
            <div class="flex items-center gap-2 text-xs font-bold text-lumyena-muted">
                <span class="flex items-center gap-1"><span class="text-green-500">✔</span> Proses Instan</span>
                <span>•</span>
                <span class="flex items-center gap-1"><span class="text-blue-500">✔</span> Layanan 24/7</span>
            </div>
        </div>
    </div>

        <!-- MAIN FORM SEAMLESS -->
        
        <!-- STEP 1: Masukkan Data Akun -->
        <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] p-5 lg:p-8 mb-8 relative">
            <div class="absolute -top-5 left-5 bg-lumyena-primary text-white w-10 h-10 rounded-full flex items-center justify-center font-black text-xl border-4 border-white shadow-md">1</div>
            
            <h2 class="text-xl font-extrabold text-lumyena-text ml-8 mb-6">Masukkan Informasi Akun</h2>
            
            <div class="mb-5">
                <label class="block text-sm font-bold text-lumyena-muted mb-2">
                    Nama Panggilan *
                    @if(auth()->check())
                        <span class="ml-2 inline-flex items-center gap-1 text-[10px] uppercase font-extrabold text-white bg-green-500 px-2 py-0.5 rounded-full"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg> Dari Profil</span>
                    @endif
                </label>
                <input type="text" id="waBuyerName" required value="{{ auth()->check() ? auth()->user()->name : '' }}" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" placeholder="Contoh: Budi">
            </div>

            @if($product->category->name == 'Streaming')
                <div>
                    <label class="block text-sm font-bold text-lumyena-muted mb-2">
                        Email Akun {{ $product->name }} *
                        @if(auth()->check() && auth()->user()->streaming_username)
                            <span class="ml-2 inline-flex items-center gap-1 text-[10px] uppercase font-extrabold text-white bg-green-500 px-2 py-0.5 rounded-full"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg> Dari Profil</span>
                        @endif
                    </label>
                    <input type="email" id="waUsername" required value="{{ auth()->check() ? auth()->user()->streaming_username : '' }}" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" placeholder="Contoh: budi@gmail.com">
                </div>
            @else
                <div>
                    <label class="block text-sm font-bold text-lumyena-muted mb-2">
                        ID Game & Server Khusus *
                        @if(auth()->check() && auth()->user()->game_id)
                            <span class="ml-2 inline-flex items-center gap-1 text-[10px] uppercase font-extrabold text-white bg-green-500 px-2 py-0.5 rounded-full"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg> Dari Profil</span>
                        @endif
                    </label>
                    <input type="text" id="waGameId" required value="{{ auth()->check() ? auth()->user()->game_id : '' }}" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" placeholder="Ketikan ID Game (Zone ID)">
                    <p class="text-xs text-lumyena-muted mt-2 pl-1 italic">Untuk mencari ID/Server Game, sentuh avatar Anda di sudut kiri atas layar utama menu permainan.</p>
                </div>
            @endif
        </div>

        <!-- STEP 2: Pilih Nominal -->
        <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] p-5 lg:p-8 mb-8 relative">
            <div class="absolute -top-5 left-5 bg-lumyena-primary text-white w-10 h-10 rounded-full flex items-center justify-center font-black text-xl border-4 border-white shadow-md">2</div>
            
            <h2 class="text-xl font-extrabold text-lumyena-text ml-8 mb-6">Pilih Nominal Top-Up</h2>
            
            <div class="mt-4">
                @if($product->variations->count() > 0)
                    @php
                        $groupedVariations = $product->variations->groupBy('group');
                    @endphp
                    @foreach($groupedVariations as $group => $variations)
                        @if($group)
                            <h3 class="font-extrabold text-lumyena-text text-sm mb-3 mt-4 ml-2">{{ $group }}</h3>
                        @endif
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach($variations as $var)
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="variation_id" value="{{ $var->id }}" data-name="{{ $var->name }}" data-price="{{ $var->formatted_price }}" @change="formattedPrice = '{{ $var->formatted_price }}'" class="peer sr-only">
                                <div class="h-full bg-white border-4 border-lumyena-border rounded-2xl p-4 flex flex-col justify-between transition-all duration-300 peer-checked:border-lumyena-primary peer-checked:bg-lumyena-light peer-checked:shadow-[0_4px_0_#FF69B4] hover:-translate-y-1 hover:border-lumyena-primary/50 relative overflow-hidden">
                                    <div>
                                        <span class="block text-sm font-extrabold text-lumyena-text">{{ $var->name }}</span>
                                        <span class="block text-xs font-bold text-lumyena-primary mt-1">{{ $var->formatted_price }}</span>
                                    </div>
                                    <div class="absolute top-2 right-2 w-5 h-5 rounded-full bg-lumyena-primary text-white flex items-center justify-center opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <svg class="w-3 h-3 break-words" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        <div class="h-full bg-lumyena-light border-4 border-lumyena-primary rounded-2xl p-4 flex justify-between items-center shadow-[0_4px_0_#FF69B4]">
                            <div>
                                <span class="block text-base font-extrabold text-lumyena-text">{{ $product->name }}</span>
                                <span class="block text-sm font-bold text-lumyena-primary mt-1">{{ $product->formatted_price }}</span>
                            </div>
                            <div class="w-6 h-6 rounded-full bg-lumyena-primary text-white flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- STEP 3: Pilih Pembayaran -->
        <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] p-5 lg:p-8 mb-8 relative">
            <div class="absolute -top-5 left-5 bg-lumyena-primary text-white w-10 h-10 rounded-full flex items-center justify-center font-black text-xl border-4 border-white shadow-md">3</div>
            
            <h2 class="text-xl font-extrabold text-lumyena-text ml-8 mb-6">Pilih Pembayaran</h2>
            
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3">
                @php 
                    $payments = ['BCA', 'OVO', 'GOPAY', 'DANA', 'SHOPEEPAY']; 
                    $userPayment = auth()->check() ? auth()->user()->preferred_payment : null;
                @endphp
                @foreach($payments as $index => $pay)
                    <label class="relative cursor-pointer group">
                        <input type="radio" name="payment_method" value="{{ $pay }}" {{ ($userPayment == $pay || (!$userPayment && $index == 0)) ? 'checked' : '' }} class="peer sr-only">
                        <div class="h-20 bg-lumyena-light border-2 border-lumyena-border rounded-2xl flex items-center justify-center transition-all duration-300 peer-checked:border-4 peer-checked:border-[#00d2d3] peer-checked:bg-white peer-checked:shadow-[0_4px_0_#48dbfb] hover:-translate-y-1 hover:border-lumyena-primary/50 relative overflow-hidden">
                            <span class="font-extrabold text-lg tracking-wide text-lumyena-text">{{ $pay }}</span>
                            <div class="absolute top-0 right-0 w-8 h-8 rounded-bl-2xl bg-[#00d2d3] text-white flex justify-center items-center opacity-0 peer-checked:opacity-100 transition-opacity">
                                <svg class="w-4 h-4 -mt-1 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Sticky Mobile Bottom Bar / Desktop Button -->
        <div class="fixed bottom-0 left-0 right-0 p-4 bg-white/95 backdrop-blur-md border-t-2 border-lumyena-border shadow-[0_-10px_20px_rgba(255,182,193,0.3)] z-40 lg:relative lg:bg-transparent lg:border-0 lg:shadow-none lg:p-0">
            <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="hidden lg:block">
                    <p class="text-sm font-bold text-lumyena-muted mb-1">Total Pembayaran</p>
                    <p class="text-3xl font-black text-lumyena-primary" x-text="formattedPrice">{{ $product->formatted_price }}</p>
                </div>
                
                <!-- Type is explicitely NOT submit, to prevent 404 native forms refresh. -->
                <button type="button" id="buyBtn" 
                    onclick="executeWhatsApp(this)" 
                    data-has-variations="{{ $product->variations->count() > 0 ? 'true' : 'false' }}"
                    data-is-streaming="{{ $product->category->name === 'Streaming' ? 'true' : 'false' }}"
                    data-phone="{{ config('app.wa_admin_phone') }}"
                    data-category-name="{{ $product->category->name }}"
                    data-product-name="{{ $product->name }}"
                    data-formatted-price="{{ $product->formatted_price }}"
                    class="w-full lg:w-auto text-xl font-extrabold text-white bg-lumyena-primary border-4 border-lumyena-hover py-4 px-10 rounded-full shadow-[0_6px_0_#FF1493] active:translate-y-2 active:shadow-[0_0px_0_#FF1493] transition-all hover:bg-lumyena-hover flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.89-4.443 9.893-9.892.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.738-.974zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    Pesan via WA
                </button>
            </div>
        </div>

    
    <script>
        function executeWhatsApp(btn) {
            const data = btn.dataset;
            const isStreaming = data.isStreaming === 'true';
            const hasVariations = data.hasVariations === 'true';

            // Validation check logic first
            if (!document.getElementById('waBuyerName').value) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Mohon isi Nama Panggilan Anda!',
                    confirmButtonColor: '#FF69B4',
                });
                return;
            }

            if (isStreaming) {
                if (!document.getElementById('waUsername').value) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Mohon isi Email Akun sebelum mengorder!',
                        confirmButtonColor: '#FF69B4',
                    });
                    return;
                }
            } else {
                if (!document.getElementById('waGameId').value) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Mohon isi ID/Server Game sebelum mengorder!',
                        confirmButtonColor: '#FF69B4',
                    });
                    return;
                }
            }

            if (hasVariations) {
                const selectedVar = document.querySelector('input[name="variation_id"]:checked');
                if (!selectedVar) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Pilih Nominal!',
                        text: 'Mohon pilih nominal top-up terlebih dahulu!',
                        confirmButtonColor: '#FF69B4',
                    });
                    return;
                }
            }

            Swal.fire({
                title: 'Konfirmasi Pesanan?',
                text: "Anda akan diarahkan ke WhatsApp admin dengan detail pesanan ini.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#00d2d3',
                cancelButtonColor: '#FF69B4',
                confirmButtonText: 'Ya, Lanjut Pesan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    processOrder(data, hasVariations);
                }
            });
        }

        function processOrder(data, hasVariations) {
            let phone = data.phone;
            if (phone.startsWith('08')) { phone = '628' + phone.substring(2); }

            const user = document.getElementById('waBuyerName').value;
            const category = data.categoryName;
            let product = data.productName;
            let price = data.formattedPrice;

            if (hasVariations) {
                const selectedVar = document.querySelector('input[name="variation_id"]:checked');
                if (selectedVar) {
                    product = data.productName + " (" + selectedVar.dataset.name + ")";
                    price = selectedVar.dataset.price;
                }
            }

            let payment = document.querySelector('input[name="payment_method"]:checked')?.value || '-';

            let message = "";
            if (category === "Streaming") {
                const username = document.getElementById('waUsername').value;
                message = `Format Premium App @LumYena\n` +
                          `❁ Pembeli : ${user}\n` +
                          `❁ Pesanan : ${product}\n` +
                          `❁ Email : ${username}\n` +
                          `❁ Total Harga : ${price}\n` +
                          `❁ Payment : ${payment}\n` +
                          `❁ Send to @LumYena`;
            } else {
                const gameId = document.getElementById('waGameId').value;
                message = `Format Game Top-Up @LumYena\n` +
                          `❁ Name + Username : ${user}\n` +
                          `❁ Produk     : ${product}\n` +
                          `❁ Target ID  : ${gameId}\n` +
                          `❁ Total Harga: ${price}\n` +
                          `❁ Payment    : ${payment}\n` +
                          `❁ Send to @LumYena`;
            }

            // Fire Confetti!
            if (window.confetti) {
                confetti({
                    particleCount: 150,
                    spread: 80,
                    origin: { y: 0.6 },
                    colors: ['#FF69B4', '#FFC0CB', '#00d2d3', '#ffffff']
                });
            }
            // Redirect immediately
            const encodedMessage = encodeURIComponent(message);
            window.open(`https://wa.me/${phone}?text=${encodedMessage}`, '_blank');
        }
    </script>
</div>
@endsection
