@extends('layouts.app')

@push('scripts')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script>
    $(document).ready(function() {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                window.location.href = result.finish_redirect_url;
            }
        });
    });
</script>
@endpush