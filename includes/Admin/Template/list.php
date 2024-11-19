<div class="container-sm items-container">
    <h4><?php echo $result['title'] ?></h4>
    <button type="button" class="btn btn-primary btn-sm btn-create" data-bs-target="#addItemModal" data-bs-toggle="modal">Create new item</button>
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

<div id="addItemModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="add-item-form">
                <div class="mb-3">
                    <label for="item-name" class="form-label">Item name</label>
                    <div class="input-group">
                        <input name="item_name" id="item-name" class="form-control" type="text" placeholder="">
                    </div>
                    <div class="err_container"></div>
                </div>

                <div class="mb-3">
                    <label for="item-position" class="form-label">Position</label>
                    <div class="input-group">
                        <input name="item_position" id="item-position" class="form-control" type="number" placeholder="">
                    </div>
                    <div class="err_container"></div>
                </div>

            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-save">Save</button>
      </div>
    </div>
  </div>
</div>
