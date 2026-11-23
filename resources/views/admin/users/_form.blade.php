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

<div class="mb-3">
    <label class="form-label">Role</label>
    <select name="role" class="form-control" required>
        <option value="">-- Pilih Role --</option>
        <option value="Super Admin" {{ old('role', $user->role ?? '') == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
        <option value="Pelanggan" {{ old('role', $user->role ?? '') == 'Pelanggan' ? 'selected' : '' }}>Pelanggan</option>
        <option value="Mitra" {{ old('role', $user->role ?? '') == 'Mitra' ? 'selected' : '' }}>Mitra</option>
    </select>
</div>