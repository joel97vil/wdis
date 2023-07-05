<label class="btn btn-outline-primary {{ $class ?? '' }}">
    <input type="checkbox"
           id="{{ $id }}"
           name="{{ $name }}"
           aria-label="{{ $label }}"
           value="{{ $value }}"
    >
    {{ $label }}
</label>
