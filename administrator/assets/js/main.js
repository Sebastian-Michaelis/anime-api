document.addEventListener("DOMContentLoaded", function () {

  const totalRecords = document.querySelector(".pagination").getAttribute('data-total');
  const totalRecordItems = 4;

  renderPagination(1, totalRecords); //on first load render the pagination
  renderRecord(1, totalRecordItems);//on first load, load the records
  //pagination event
  document.addEventListener('click', function (event) {
    if (event.target.matches('.pagination button')) {
      let page = Number(event.target.getAttribute('data-page'));
      renderPagination((page), totalRecords);
      renderRecord(page, totalRecordItems);
    }
  });

  // click on delete btn
  document.addEventListener('click', function (event) {
    let click = event.target.closest('.table-section .del-btn');
    if (click) {
      deleteItem(click.getAttribute('data-record'), totalRecordItems);
    }
  })

});
//render the record using promise
function renderRecord(page, totalRecordItems) {
  getRecords(page, totalRecordItems).then(response => {
    const list = createItemList(JSON.parse(response));
    document.querySelector('.table-section tbody').innerHTML = list;
  });
}
//read records using pagination
function getRecords(currentPage, RecordItems) {

  return new Promise(function (resolve, reject) {
    const xhttp = new XMLHttpRequest();
    let response = '';
    xhttp.onload = function () {
      if (this.status == 200)
        resolve(this.responseText);
      else
        reject(this.status);
    }
    xhttp.open("GET", `http://localhost:84/pagination-record.php?page=${currentPage}&limit=${RecordItems}`);
    xhttp.setRequestHeader('page', currentPage);
    xhttp.setRequestHeader('limit', RecordItems);
    xhttp.send();
  });


}
//create dynamic pagination
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

  if (current > 1) // if the current page is greater than 1
    html += `<li class="page-item "><button class="page-link" data-page="${current - 1}">Prev</button></li>`;

  for (let x = start; x <= end; x++)
    if (x == current)
      html += `<li class="page-item "><button class="page-link active" data-page="${x}">${x}</button></li>`;
    else
      html += `<li class="page-item "><button class="page-link" data-page="${x}">${x}</button></li>`;

  if (current < totalPages) // if the current page is not the last page
    html += `<li class="page-item "><button class="page-link" data-page="${current + 1}">Next</button></li>`;

  document.getElementsByClassName('pagination')[0].innerHTML = html; // attach the pagination

}
// creating list items from repsonse
function createItemList(arr) {
  let html = '';
  html = arr.reduce(function (prev, value) {
    return prev + `<tr>
                <td>${value['serialNo']}</td>
                <td>${value['title']}</td>
                <td>${value['quote']}</td>
                <td>${value['saidBy']}</td>
                <td class="text-center">
                    <button class="btn-icon edit-btn" data-record="${value['id']}"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></button>
                    <button class="btn-icon del-btn text-danger" data-record="${value['id']}"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button>
                </td>
            </tr>`;
  }, '');
  return html;
}
//delete the record
function deleteRecord(id) {
  return new Promise((resolve, reject) => {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      if (this.status == 200)
        resolve(this.responseText);
      else
        reject(this.status);
    }
    xhttp.open("DELETE", "http://localhost:84/delete-record.php");
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.send(JSON.stringify({'data-id': id}));
  });

}

//resolve the delete promise
function deleteItem(id, totalRecordItems) {
  deleteRecord(id).then(response => {
    if (response) {
      renderRecord(document.querySelector('.pagination .active').getAttribute('data-page'), totalRecordItems);//getting the current page and rendering the data
      createToast("Record Deleted Successfully.") 
    }
  });
}

function createToast(message) {
  let html = `<div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div class="toast delete-toast text-bg-success align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="d-flex">
                    <div class="toast-body">
                      ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
              </div>
            </div>`;
  //if i append it directly it will insert as text node thats why i used insertAdjacentHTML          
  document.querySelector('body').insertAdjacentHTML('beforeend', html);
  const toastLiveExample = document.querySelector('.delete-toast');
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
  toastBootstrap.show();
  //hide the toast after 4 seconds
  setTimeout(function () {
    toastBootstrap.hide();
  }, 4000);
}

