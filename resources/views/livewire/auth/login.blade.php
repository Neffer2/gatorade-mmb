<div class="">
    <div class="form-group mt-3"> 
        <input wire:model.lazy="email" name="correo" type="text" class="form-control 
        @error('email') is-invalid @elseif(strlen($email) > 0) is-valid @enderror" value="{{ old('email') }}"
        placeholder="Correo" required>
        @error('email')
            <div id="email" class="text-danger bold"> 
                {{ $message }}
            </div>
        @enderror 
    </div> 
    <div class="form-group mt-3">
        <input wire:model.lazy="pass" name="password" type="password" class="form-control 
        @error('pass') is-invalid @elseif(strlen($pass) > 0) is-valid @enderror" value="{{ old('pass') }}"
        placeholder="Contraseña" required>
        @error('pass')
            <div id="pass" class="text-danger bold"> 
                {{ $message }}
            </div>
        @enderror
    </div> 
</div> 
