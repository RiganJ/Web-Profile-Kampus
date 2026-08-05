<nav class="sidebar sidebar-offcanvas" id="sidebar">

<ul class="nav">

@php
    $currentPath = request()->path();
    $isActive = fn (string $path) => str_starts_with($currentPath, ltrim($path, '/'));
    $user = auth()->user();
@endphp

<li class="nav-item nav-profile">
<div class="nav-link">

<div class="profile-image">
<img src="{{ $user->profile_photo_url }}" alt="image"/>
</div>

<div class="profile-name">
<p class="name">
{{ $user->name ?? 'Welcome Admin' }}
</p>

<p class="designation">
{{ \App\Models\User::roleOptions()[$user->role] ?? 'Admin' }}
</p>
</div>

</div>
</li>

<li class="nav-item">
<a class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}" href="{{ route('admin.profile.edit') }}">
<i class="fas fa-user-cog menu-icon"></i>
<span class="menu-title">Pengaturan Profil</span>
</a>
</li>

@if($user->canAccessModule('dashboard'))
<li class="nav-item">
<a class="nav-link {{ $currentPath === 'admin' ? 'active' : '' }}" href="/admin">
<i class="fa fa-home menu-icon"></i>
<span class="menu-title">Dashboard</span>
</a>
</li>
@endif

@if($user->canAccessModule('mahasiswa'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/mahasiswa') ? 'active' : '' }}" href="/admin/mahasiswa">
<i class="fas fa-user-graduate menu-icon"></i>
<span class="menu-title">Mahasiswa</span>
</a>
</li>
@endif

@if($user->canAccessModule('dosen'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/dosen') ? 'active' : '' }}" href="/admin/dosen">
<i class="fas fa-chalkboard-teacher menu-icon"></i>
<span class="menu-title">Dosen</span>
</a>
</li>
@endif

@if($user->canAccessModule('berita'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/berita') ? 'active' : '' }}" href="/admin/berita">
<i class="fas fa-newspaper menu-icon"></i>
<span class="menu-title">Berita</span>
</a>
</li>
@endif

@if($user->canAccessModule('chat'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/chat') ? 'active' : '' }}" href="{{ route('admin.chat.index') }}">
<i class="fas fa-comments menu-icon"></i>
<span class="menu-title">Pesan & Live Chat</span>
</a>
</li>
@endif

@if($user->canAccessModule('users'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/users') ? 'active' : '' }}" href="/admin/users">
<i class="fas fa-users menu-icon"></i>
<span class="menu-title">User Management</span>
</a>
</li>
@endif

@if($user->canAccessModule('akreditasi'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/akreditasi') ? 'active' : '' }}" href="/admin/akreditasi">
<i class="fas fa-award menu-icon"></i>
<span class="menu-title">Akreditasi</span>
</a>
</li>
@endif

@if($user->canAccessModule('panduan_akademik'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/panduan-akademik') ? 'active' : '' }}" href="/admin/panduan-akademik">
<i class="fas fa-file-pdf menu-icon"></i>
<span class="menu-title">Pusat Informasi</span>
</a>
</li>
@endif

@if($user->canAccessModule('pimpinan_profile'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/pimpinan-profile') ? 'active' : '' }}" href="/admin/pimpinan-profile">
<i class="fas fa-user-tie menu-icon"></i>
<span class="menu-title">Profil Pimpinan</span>
</a>
</li>
@endif

@if($user->canAccessModule('banner'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/banner') ? 'active' : '' }}" href="/admin/banner">
<i class="fas fa-image menu-icon"></i>
<span class="menu-title">Banner</span>
</a>
</li>
@endif

@if($user->canAccessModule('kerjasama'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/kerjasama') ? 'active' : '' }}" href="/admin/kerjasama">
<i class="fas fa-handshake menu-icon"></i>
<span class="menu-title">Kerja Sama</span>
</a>
</li>
@endif

@if($user->canAccessModule('civitas'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/civitas') ? 'active' : '' }}" href="/admin/civitas">
<i class="fas fa-users menu-icon"></i>
<span class="menu-title">Civitas</span>
</a>
</li>
@endif

@if($user->canAccessModule('prodi'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/prodi') && ! $isActive('admin/prodi-hero') ? 'active' : '' }}" href="/admin/prodi">
<i class="fas fa-book menu-icon"></i>
<span class="menu-title">Prodi</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/prodi-hero') ? 'active' : '' }}" href="{{ route('prodi-hero.index') }}">
<i class="fas fa-images menu-icon"></i>
<span class="menu-title">Hero Prodi</span>
</a>
</li>
@endif

@if($user->canAccessModule('fakultas'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/fakultas') ? 'active' : '' }}" href="/admin/fakultas">
<i class="fas fa-university menu-icon"></i>
<span class="menu-title">Fakultas</span>
</a>
</li>
@endif

@if($user->canAccessModule('beasiswa'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/beasiswa') ? 'active' : '' }}" href="/admin/beasiswa">
<i class="fas fa-graduation-cap menu-icon"></i>
<span class="menu-title">Beasiswa</span>
</a>
</li>
@endif

@if($user->canAccessModule('guru_besar'))
<li class="nav-item">
<a class="nav-link {{ $isActive('admin/guru-besar') ? 'active' : '' }}" href="/admin/guru-besar">
<i class="fas fa-user-tie menu-icon"></i>
<span class="menu-title">Guru Besar</span>
</a>
</li>
@endif

<li class="nav-item">
    <form method="POST"
          action="{{ route('logout') }}">

        @csrf

        <button class="nav-link border-0 bg-transparent w-100 text-start">
            <i class="fas fa-sign-out-alt menu-icon text-danger"></i>
            <span class="menu-title text-danger">Logout</span>
        </button>

    </form>
</li>

</ul>

</nav>
