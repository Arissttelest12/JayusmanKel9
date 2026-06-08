@extends('layouts.app')

@section('title', 'Point of Sale (POS)')
@section('header-title', 'Point of Sale (POS)')

@section('content')
<div class="flex flex-col md:flex-row gap-6 h-[calc(100vh-8rem)]" x-data="posSystem()">
    
    <!-- LEFT SIDE: Cart & Product Input -->
    <div class="flex-1 flex flex-col bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        
        <!-- Header Info -->
        <div class="bg-slate-50 border-b border-slate-100 p-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#00ADB5]/10 rounded-full flex items-center justify-center text-[#00ADB5]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-800">{{ $user->name }}</p>
                    <p class="text-xs text-slate-500">Kasir</p>
                </div>
            </div>
            
            <div class="text-right">
                <p class="text-sm font-semibold text-[#00ADB5]" id="tanggal-sekarang">{{ now()->format('d M Y') }}</p>
            </div>
        </div>

        <!-- Input Area (Scan/Search) -->
        <div class="p-4 border-b border-slate-100 flex gap-4">
            <!-- Branch Selector (if admin, else fixed hidden) -->
            @if($user->hasRole(['Kasir', 'kasir']))
                <input type="hidden" id="id_cabang" name="id_cabang" value="{{ $user->id_cabang }}">
                <div class="hidden">
                    <select id="cabang_selector" class="w-full">
                        <option value="{{ $user->id_cabang }}" selected>Cabang Kasir</option>
                    </select>
                </div>
            @else
                <div class="w-1/3">
                    <select id="cabang_selector" class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]" onchange="pos.loadProducts()">
                        <option value="">-- Pilih Cabang --</option>
                        @foreach($cabangs as $cabang)
                            <option value="{{ $cabang->id_cabang }}">{{ $cabang->nama_cabang }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" id="product_search" class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-[#00ADB5] focus:ring-2 focus:ring-[#00ADB5]/20 transition-all text-sm" placeholder="Scan Barcode atau Cari Nama Barang... (Tekan Enter)" autocomplete="off">
                
                <!-- Autocomplete Dropdown -->
                <div id="search_results" class="absolute z-50 w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-lg hidden max-h-60 overflow-y-auto">
                    <!-- Results populated by JS -->
                </div>
            </div>
        </div>

        <!-- Cart Table -->
        <div class="flex-1 overflow-y-auto bg-slate-50/50 p-4">
            <div class="bg-white rounded-xl border border-slate-100 overflow-hidden">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-slate-500 font-semibold border-b border-slate-100">
                        <tr>
                            <th class="py-3 px-4 w-10 text-center">#</th>
                            <th class="py-3 px-4">Barang</th>
                            <th class="py-3 px-4 text-right">Harga</th>
                            <th class="py-3 px-4 text-center w-32">Qty</th>
                            <th class="py-3 px-4 text-right">Subtotal</th>
                            <th class="py-3 px-4 text-center w-16">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="cart_body" class="divide-y divide-slate-100">
                        <!-- Empty State -->
                        <tr id="empty_cart_row">
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path></svg>
                                <p>Keranjang masih kosong</p>
                                <p class="text-xs mt-1">Scan barcode atau cari barang untuk menambahkan</p>
                            </td>
                        </tr>
                        <!-- Cart Items Populated by JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE: Summary & Checkout -->
    <div class="w-full md:w-80 flex flex-col gap-4">
        
        <!-- Summary Card -->
        <div class="bg-[#222831] text-white rounded-2xl p-6 shadow-lg relative overflow-hidden">
            <!-- Decorative circle -->
            <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white/5 pointer-events-none"></div>
            
            <h3 class="text-white/70 text-sm font-semibold uppercase tracking-wider mb-4">Ringkasan Transaksi</h3>
            
            <div class="space-y-3 mb-6">
                <div class="flex justify-between items-center">
                    <span class="text-white/80 text-sm">Total Item</span>
                    <span class="font-bold text-lg" id="summary_items">0</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-white/80 text-sm">Total Qty</span>
                    <span class="font-bold text-lg" id="summary_qty">0</span>
                </div>
            </div>
            
            <div class="pt-4 border-t border-white/10">
                <p class="text-white/70 text-sm mb-1">Grand Total</p>
                <p class="text-3xl font-bold text-[#00ADB5]" id="summary_total">Rp 0</p>
            </div>
        </div>

        <!-- Checkout Form -->
        <form action="{{ route('transactions.store') }}" method="POST" id="form_transaksi" class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex-1 flex flex-col">
            @csrf
            <input type="hidden" name="id_cabang" id="input_id_cabang" value="{{ $user->id_cabang ?? '' }}">
            
            <div class="mb-4">
                <label class="block text-sm font-bold text-slate-700 mb-2">Metode Pembayaran</label>
                <div class="relative">
                    <select name="metode_pembayaran" required class="w-full pl-4 pr-10 py-3 bg-slate-50 border border-slate-200 rounded-xl appearance-none focus:border-[#00ADB5] focus:ring-2 focus:ring-[#00ADB5]/20 font-medium text-slate-700">
                        <option value="Tunai">💵 Tunai (Cash)</option>
                        <option value="Transfer Bank">🏦 Transfer Bank</option>
                        <option value="QRIS">📱 QRIS / E-Wallet</option>
                        <option value="Kartu Debit/Kredit">💳 Kartu Debit/Kredit</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Error container -->
            <div id="error_container" class="hidden mb-4 p-3 bg-rose-50 text-rose-600 border border-rose-200 rounded-xl text-sm">
                <ul id="error_list" class="list-disc pl-4"></ul>
            </div>
            
            @if ($errors->any())
            <div class="mb-4 p-3 bg-rose-50 text-rose-600 border border-rose-200 rounded-xl text-sm">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mt-auto pt-4">
                <!-- Hidden inputs for cart items will be appended here by JS -->
                <div id="cart_inputs_container"></div>
                
                <button type="button" onclick="pos.submitTransaction()" class="w-full bg-[#00ADB5] hover:bg-[#00838F] text-white font-bold py-4 rounded-xl shadow-lg shadow-[#00ADB5]/30 transition-all transform hover:-translate-y-0.5 active:scale-95 flex justify-center items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Simpan Transaksi</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
const pos = {
    products: [],
    cart: [],
    
    init() {
        this.loadProducts();
        this.setupSearch();
    },

    loadProducts() {
        let cabangId = document.getElementById('cabang_selector') ? document.getElementById('cabang_selector').value : document.getElementById('id_cabang').value;
        document.getElementById('input_id_cabang').value = cabangId;
        
        if (!cabangId) {
            this.products = [];
            return;
        }

        fetch(`/transactions/barang-cabang/${cabangId}`)
            .then(res => res.json())
            .then(data => {
                this.products = data;
                console.log("Loaded products:", this.products);
            })
            .catch(err => console.error("Error loading products:", err));
    },

    setupSearch() {
        const input = document.getElementById('product_search');
        const results = document.getElementById('search_results');

        input.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            if (query.length < 2) {
                results.classList.add('hidden');
                return;
            }

            const matched = this.products.filter(p => 
                p.nama_barang.toLowerCase().includes(query) || 
                p.kode_barang.toLowerCase().includes(query)
            );

            this.renderSearchResults(matched);
        });

        // Handle enter key for barcode scanner
        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = e.target.value;
                const matched = this.products.find(p => p.kode_barang === query || p.kode_barang.toLowerCase() === query.toLowerCase());
                
                if (matched) {
                    this.addToCart(matched);
                    input.value = '';
                    results.classList.add('hidden');
                } else {
                    alert('Barang tidak ditemukan atau stok kosong di cabang ini.');
                }
            }
        });

        // Hide results on click outside
        document.addEventListener('click', (e) => {
            if (!input.contains(e.target) && !results.contains(e.target)) {
                results.classList.add('hidden');
            }
        });
    },

    renderSearchResults(items) {
        const results = document.getElementById('search_results');
        
        if (items.length === 0) {
            results.innerHTML = '<div class="p-3 text-sm text-slate-500 text-center">Tidak ada barang ditemukan</div>';
        } else {
            results.innerHTML = items.map(item => `
                <div class="p-3 hover:bg-slate-50 cursor-pointer border-b border-slate-100 last:border-0 flex justify-between items-center" onclick="pos.addToCartById(${item.id_barang})">
                    <div>
                        <div class="font-bold text-slate-700">${item.nama_barang}</div>
                        <div class="text-xs text-slate-500">${item.kode_barang}</div>
                    </div>
                    <div class="text-right">
                        <div class="text-[#00ADB5] font-semibold">${this.formatRupiah(item.harga_jual)}</div>
                        <div class="text-xs ${item.stok > 5 ? 'text-green-600' : 'text-rose-600'}">Stok: ${item.stok}</div>
                    </div>
                </div>
            `).join('');
        }
        results.classList.remove('hidden');
    },

    addToCartById(id) {
        const item = this.products.find(p => p.id_barang === id);
        if (item) {
            this.addToCart(item);
            document.getElementById('product_search').value = '';
            document.getElementById('search_results').classList.add('hidden');
            document.getElementById('product_search').focus();
        }
    },

    addToCart(product) {
        const existingItem = this.cart.find(item => item.id_barang === product.id_barang);
        
        if (existingItem) {
            if (existingItem.jumlah < product.stok) {
                existingItem.jumlah++;
            } else {
                alert(`Stok tidak mencukupi! Sisa stok: ${product.stok}`);
            }
        } else {
            if (product.stok > 0) {
                this.cart.push({
                    ...product,
                    jumlah: 1
                });
            } else {
                alert('Stok barang kosong!');
            }
        }
        this.renderCart();
    },

    updateQty(id, newQty) {
        const item = this.cart.find(i => i.id_barang === id);
        if (!item) return;

        const qty = parseInt(newQty);
        if (isNaN(qty) || qty < 1) {
            item.jumlah = 1;
        } else if (qty > item.stok) {
            alert(`Stok tidak mencukupi! Sisa stok: ${item.stok}`);
            item.jumlah = item.stok;
        } else {
            item.jumlah = qty;
        }
        this.renderCart();
    },

    removeFromCart(id) {
        this.cart = this.cart.filter(item => item.id_barang !== id);
        this.renderCart();
    },

    renderCart() {
        const tbody = document.getElementById('cart_body');
        const emptyRow = document.getElementById('empty_cart_row');
        
        // Remove existing items
        document.querySelectorAll('.cart-item-row').forEach(el => el.remove());

        if (this.cart.length === 0) {
            emptyRow.style.display = 'table-row';
        } else {
            emptyRow.style.display = 'none';
            
            this.cart.forEach((item, index) => {
                const subtotal = item.jumlah * item.harga_jual;
                const tr = document.createElement('tr');
                tr.className = 'cart-item-row hover:bg-white transition-colors group';
                tr.innerHTML = `
                    <td class="py-3 px-4 text-center text-slate-400 font-medium">${index + 1}</td>
                    <td class="py-3 px-4">
                        <p class="font-bold text-slate-700">${item.nama_barang}</p>
                        <p class="text-xs text-slate-400 font-mono">${item.kode_barang}</p>
                    </td>
                    <td class="py-3 px-4 text-right font-medium">${this.formatRupiah(item.harga_jual)}</td>
                    <td class="py-3 px-4">
                        <div class="flex items-center justify-center space-x-2">
                            <button type="button" onclick="pos.updateQty(${item.id_barang}, ${item.jumlah - 1})" class="w-7 h-7 rounded-full bg-slate-100 text-slate-600 hover:bg-[#00ADB5] hover:text-white transition-colors flex items-center justify-center focus:outline-none">-</button>
                            <input type="number" value="${item.jumlah}" min="1" max="${item.stok}" onchange="pos.updateQty(${item.id_barang}, this.value)" class="w-12 text-center py-1 px-2 border border-slate-200 rounded-lg text-sm font-semibold focus:border-[#00ADB5] focus:ring-0 appearance-none">
                            <button type="button" onclick="pos.updateQty(${item.id_barang}, ${item.jumlah + 1})" class="w-7 h-7 rounded-full bg-slate-100 text-slate-600 hover:bg-[#00ADB5] hover:text-white transition-colors flex items-center justify-center focus:outline-none">+</button>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-right font-bold text-[#00ADB5]">${this.formatRupiah(subtotal)}</td>
                    <td class="py-3 px-4 text-center">
                        <button type="button" onclick="pos.removeFromCart(${item.id_barang})" class="text-rose-400 hover:text-rose-600 hover:bg-rose-50 p-2 rounded-lg transition-colors focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        this.updateSummary();
        this.updateFormInputs();
    },

    updateSummary() {
        let totalItems = this.cart.length;
        let totalQty = 0;
        let grandTotal = 0;

        this.cart.forEach(item => {
            totalQty += item.jumlah;
            grandTotal += (item.jumlah * item.harga_jual);
        });

        document.getElementById('summary_items').innerText = totalItems;
        document.getElementById('summary_qty').innerText = totalQty;
        document.getElementById('summary_total').innerText = this.formatRupiah(grandTotal);
    },

    updateFormInputs() {
        const container = document.getElementById('cart_inputs_container');
        container.innerHTML = ''; // Clear old inputs

        this.cart.forEach((item, index) => {
            container.innerHTML += `
                <input type="hidden" name="items[${index}][id_barang]" value="${item.id_barang}">
                <input type="hidden" name="items[${index}][jumlah]" value="${item.jumlah}">
                <input type="hidden" name="items[${index}][harga_satuan]" value="${item.harga_jual}">
            `;
        });
    },

    submitTransaction() {
        if (this.cart.length === 0) {
            alert('Keranjang masih kosong! Tambahkan barang terlebih dahulu.');
            return;
        }

        const cabangId = document.getElementById('input_id_cabang').value;
        if (!cabangId) {
            alert('Pilih cabang terlebih dahulu!');
            return;
        }

        // Disable button to prevent double submit
        const btn = document.querySelector('button[onclick="pos.submitTransaction()"]');
        const originalText = btn.innerHTML;
        btn.innerHTML = `<svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Menyimpan...`;
        btn.disabled = true;

        document.getElementById('form_transaksi').submit();
    },

    formatRupiah(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(amount);
    }
};

// Initialize on load
document.addEventListener('DOMContentLoaded', () => {
    pos.init();
});
</script>
@endsection
