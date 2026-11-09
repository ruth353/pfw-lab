<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="name" class="form-control" 
           value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" 
           value="{{ old('email', $user->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control" 
           {{ isset($user) ? '' : 'required' }}>
    @if(isset($user))
        <small class="text-muted">Kosongkan bila tidak ingin mengganti password.</small>
    @endif
</div>

<div class="mb-3">
    <label class="form-label">Konfirmasi Password</label>
    <input type="password" name="password_confirmation" class="form-control" 
           {{ isset($user) ? '' : 'required' }}>
</div>