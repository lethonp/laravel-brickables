<form class="mx-1" role="form" method="POST" action="{{ $brick->brickable->getMoveDownRoute($brick) }}">
    @csrf
    <input type="hidden" name="admin_panel_url" value="{{ url()->current() }}#bricks-admin-panel">
    <button class="btn btn-link p-0" type="submit" title="@lang('Move down')">
        <i class="fas fa-long-arrow-alt-down fa-fw"></i>
    </button>
</form>
