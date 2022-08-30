<div>
    <!-- App Search-->
    <form wire:submit.prevent="searchEmpleado()" class="app-search d-none d-lg-block">
        <div class="position-relative">
            <input wire:model.lazy="search" type="number" maxlength="6" class="form-control"
                placeholder="Buscar empleado...">
            <span class="ri-search-line"></span>
        </div>
    </form>
</div>
