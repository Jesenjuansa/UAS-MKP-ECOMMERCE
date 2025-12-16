<style>
.alert {
    padding: 12px 16px;
    margin-bottom: 15px;
    border-radius: 6px;
    font-size: 14px;
}

.alert-success {
    background: #e6fffa;
    color: #065f46;
    border: 1px solid #34d399;
}

.alert-error {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #f87171;
}

</style>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-error">
    {{ session('error') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-error">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
