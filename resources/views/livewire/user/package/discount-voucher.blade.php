<div>
    <form class="space-y-4" wire:submit="voucher" method="POST">
        @csrf
        @method('POST')
        <div>
            <div>
                <x-input-label for="voucher" :value="__('Masukkan Vouchermu')" />
                <x-text-input type="text"  name="voucherCode" wire:model="voucherCode" id="voucherCode" placeholder="Masukan Code Voucher" required />
                <x-input-error :messages="$errors->get('voucherCode')" class="mt-2" />
            </div>
        </div>
        <x-primary-button type="submit">
            Tambah Voucher
        </x-primary-button>
    </form>
</div>
