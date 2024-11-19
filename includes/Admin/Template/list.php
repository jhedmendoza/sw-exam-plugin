<style>
    #list-items .dashicons {float:right}
    .ui-sortable-handle {cursor: n-resize;}
    .delete-item {cursor: pointer}
</style>

<div class="container-sm items-container">
    <h4><?php echo $result['title'] ?></h4>
    <button class="btn btn-primary btn-sm">Create new item</button>
    <div class="card">
        <div class="card-body">
            <ul id="list-items" class="list-group list-group-flush">
                <?php if ( isset($result['items']) && !empty($result['items']) ): ?>
                    <?php foreach($result['items'] as $key => $item): ?>
                        <li id="list_<?php echo $item->id ?>"  class="list-group-item"><?php echo $item->name ?>  <span data-id="<?php echo $item->id ?>" class="delete-item dashicons dashicons-trash text-danger"></span></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>No data available.</li>
                <?php endif; ?>
            </ul>
        </div>
       
    </div>
    <div class="form-text">Drag an item to change order</div>
</div>
