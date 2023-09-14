<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Singvlar Furniture')
                <h2>Singvlar Furniture</h2>
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
