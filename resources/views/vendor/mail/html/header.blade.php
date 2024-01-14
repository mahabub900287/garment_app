@props(['url'])

<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) !== 'Laravel')
                <img src="{{ asset('assets/front/images/logo/main-logo.png') }}" class="logo" alt="Voltanex Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
