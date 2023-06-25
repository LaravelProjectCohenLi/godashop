<div>
    <div class="modal-header bg-color">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title text-center">Đăng ký</h3>
    </div>
    <form wire:submit.prevent="register()">
        <div class="modal-body">
            @if($isSent)
                <div>Bạn đã đăng ký thành công!</div>
                <div>Vui lòng kiểm tra email!</div>
            @endif
            <div class="form-group">
                <input type="text" class="form-control" wire:model="name" placeholder="Họ và tên" oninput="this.setCustomValidity('')">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" wire:model="phone" placeholder="Số điện thoại" oninput="this.setCustomValidity('')">
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <input type="email" class="form-control" wire:model="email" placeholder="Email" oninput="this.setCustomValidity('')">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" wire:model="password" placeholder="Mật khẩu" oninput="this.setCustomValidity('')">
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" wire:model="password_confirmation" placeholder="Nhập lại mật khẩu" oninput="this.setCustomValidity('')">
                @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </div>
    </form>
</div>