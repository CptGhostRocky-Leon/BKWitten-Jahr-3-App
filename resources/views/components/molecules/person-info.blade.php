@props([
    'name' => null,
    'room' => null,
    'phone' => null,
    'mobile' => null,
    'email' => null,
    'focus' => null,
])

<div class="mb-6 mt-6">
    @if (!empty($name))
        <h4 class="font-semibold text-slate-900">
            {{ $name }}
        </h4>
    @endif

    <div class="mt-2 space-y-1 leading-7 text-slate-700">
        @if (!empty($room))
            <p>
                <strong>Raum:</strong>
                {{ $room }}
            </p>
        @endif

        @if (!empty($phone))
            <p>
                <strong>Tel.:</strong>
                {{ $phone }}
            </p>
        @endif

        @if (!empty($mobile))
            <p>
                <strong>Mobil:</strong>
                {{ $mobile }}
            </p>
        @endif

        @if (!empty($email))
            <p class="mb-6">
                <strong>E-Mail:</strong>
                  <x-atoms.email-link :email="$email" />
             </p>
        @endif

        @if (!empty($focus))
            <p>
                <strong>Schwerpunkt:</strong>
                {{ $focus }}
            </p>
        @endif
    </div>
</div>
