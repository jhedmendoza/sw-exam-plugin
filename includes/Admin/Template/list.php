<style>
    .list-items .dashicons {float:right}
</style>

<div class="container-sm">
    <h4><?php echo $result['title'] ?></h4>
    <button class="btn btn-primary">Create new item</button>
    <div class="card">
        <div class="card-body">
            <ul class="list-group list-group-flush list-items">
                <li class="list-group-item">An item  <span class="dashicons dashicons-trash text-danger"></span></li>
                <li class="list-group-item">A second item <span class="dashicons dashicons-trash"></span></li>
                <li class="list-group-item">A third item <span class="dashicons dashicons-trash"></span></li>
                <li class="list-group-item">A fourth item <span class="dashicons dashicons-trash"></span></li>
                <li class="list-group-item">And a fifth one <span class="dashicons dashicons-trash"></span></li>
            </ul>
        </div>
       
    </div>
    <div class="form-text">Drag an item to change order</div>
</div>
