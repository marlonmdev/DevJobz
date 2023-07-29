<div {{ $attributes->merge(['class' => 'card shadow']) }}>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>