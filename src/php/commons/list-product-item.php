<?php
return function ($item, $url, $level = '2') {
  return '
    <article class="col">
      <div class="card shadow-sm">
        <img src="/content/images/' . $item->image . '" class="card-img-top" alt="" aria-hidden="true">
        <div class="card-body">
          <h' . $level . ' class="h4"><a href="' . $url . $item->id . '">' . $item->name . '</a></h' . $level . '>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-outline-secondary">Añadir</button>
            </div>
            <small class="text-body-secondary">' . $item->price . ' EUR</small>
          </div>
        </div>
      </div>
    </article>
  ';
};
