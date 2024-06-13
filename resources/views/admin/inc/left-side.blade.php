@php
use App\Models\User;

$worker_permission = User::find(Auth::user()->id)->workersPermissions;
$worker_permission = unserialize($worker_permission->permission);
@endphp

<div class="left-sidebar col-md-2">
    <div class="left-sidebar__logo">
        <a href="/admin">
            <img src="/assets/images/logo-admin.png" alt="">
            <span>Академия Гражданской Авиации</span>
        </a>
    </div>
    <nav class="left-sidebar__nav">
        @if (isset($worker_permission->enrollees->read) && $worker_permission->enrollees->read == true)
            @include('admin.role.enrollee')
        @endif
        @if (isset($worker_permission->graduates->read) && $worker_permission->graduates->read == true)
            @include('admin.role.graduate')
        @endif
        @if (isset($worker_permission->vaccination->read) && $worker_permission->vaccination->read == true)
            @include('admin.role.vaccination')
        @endif
        @if (isset($worker_permission->pages->read) || $worker_permission->navigation->read == true)
            @include('admin.role.website')
        @endif
        @if ($worker_permission->news->read == true || isset($worker_permission->studevents->read) && $worker_permission->studevents->read == true)
            @include('admin.role.news-and-events')
        @endif
        @if (isset($worker_permission->books->read) && $worker_permission->books->read == true)
            @include('admin.role.books')
        @endif
        @if (isset($worker_permission->workers->read) && $worker_permission->workers->read == true)
            @include('admin.role.workers')
        @endif
    </nav>
</div>
