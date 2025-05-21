document.addEventListener("DOMContentLoaded", function () {
  const xhttp = new XMLHttpRequest();

  renderPagination(1,document.getElementsByClassName('page-item').length-2);
});
function getRecords() {}
function renderPagination(current, totalPages) {
  const visibleItems = 4;
  let start = Math.max(1, current - Math.floor(visibleItems / 2));
  let end = start + visibleItems - 1;
  let html = "";
  // if we are at the last 4 items
  if (end > totalPages) {
    end = totalPages;
    start = Math.max(1, end - visibleItems + 1);
  }

  if (current > 1)
    html += `<li class="page-item "><button class="page-link" data-page="${
      current - 1
    }">Prev</button></li>`;

  for (let x = start; x <= end; x++) 
    if (x == current)
      html += `<li class="page-item "><button class="page-link active" data-page="${x}">${x}</button></li>`;
    else
      html += `<li class="page-item "><button class="page-link" data-page="${x}">${x}</button></li>`;

    if (current < totalPages)
    html += `<li class="page-item "><button class="page-link" data-page="${
      current + 1
    }">Next</button></li>`;   
    document.getElementsByClassName('pagination')[0].innerHTML=html;

    
}
