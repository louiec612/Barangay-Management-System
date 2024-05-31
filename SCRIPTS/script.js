

function showDocuments(){
    var dropdown = document.getElementById('dropdown_menu')
    dropdown.classList.toggle('active');
    localStorage.setItem('dropdownActive', dropdown.classList.contains('active'));
    if (dropdown.classList.contains('active')) {
        icon.classList.add('bi-caret-up-fill');
        icon.classList.remove('bi-caret-down-fill');
    }else{
        icon.classList.remove('bi-caret-up-fill');
        icon.classList.add('bi-caret-down-fill');
    }
}
function checkDropdown() {
    var dropdownActive = localStorage.getItem('dropdownActive');
    var dropdown = document.getElementById('dropdown_menu');
    if (dropdownActive === 'true') {
        dropdown.classList.add('active');
    }
    if (dropdownActive === 'true') {
        icon.classList.add('bi-caret-up-fill');
        icon.classList.remove('bi-caret-down-fill');     
    }else{       
        icon.classList.remove('bi-caret-up-fill');
        icon.classList.add('bi-caret-down-fill');
    }
    

}

function loadTables(){
    const ctx = document.getElementById('agePopulation');
    new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['0-17', '18-49', '49-60', '61+'],
          datasets: [{
            label: '# of Population by Age',
            data: [123, 193, 31, 51],
            borderWidth: 1,
            backgroundColor: 'rgba(255, 73, 64, 0.3)',
            borderColor:   'rgb(255, 73, 64)',
            borderRadius: 5
          }],
          
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          },
          title: {
              display: true,
              text: 'Population by Gender'
            }
        }
      });

    const gPop = document.getElementById('genderPopulation');
    new Chart(gPop, {
        type: 'doughnut',
        data:{
         
          datasets: [{
            data: [253, 193],
            borderWidth: 1
          }]
          , labels: ['Male', 'Female'],
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'bottom',
            },
            title: {
              display: true,
              text: 'Population by Gender'
            }
          }
        },
      });
}

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const rowsPerPage = 8;
  let currentPage = 1;
  const table = document.getElementById('example');
  const tableBody = table.querySelector('tbody');
  const rows = Array.from(tableBody.querySelectorAll('tr'));
  const totalPages = Math.ceil(rows.length / rowsPerPage);

  function displayTableData(page) {
      const startIndex = (page - 1) * rowsPerPage;
      const endIndex = startIndex + rowsPerPage;

      rows.forEach((row, index) => {
          row.style.display = index >= startIndex && index < endIndex ? '' : 'none';
      });
  }

  function displayPagination() {
      const pagination = document.getElementById('pagination');
      pagination.innerHTML = '';

      const prev = document.createElement('a');
      prev.textContent = 'Previous';
      prev.href = '#';
      prev.classList.add('page-link');
      prev.classList.add('prev');
      prev.addEventListener('click', function (e) {
          e.preventDefault();
          if (currentPage > 1) {
              currentPage--;
              updateTableAndPagination();
          }
      });
      if(totalPages > 2){
        pagination.appendChild(prev);
      }
      

      let startPage = Math.max(currentPage - 1, 1);
      let endPage = Math.min(startPage + 2, totalPages);
      if (endPage - startPage < 2) {
          startPage = Math.max(endPage - 2, 1);
      }

      for (let i = startPage; i <= endPage; i++) {
          const a = document.createElement('a');
          a.textContent = i;
          a.href = '#';
          a.classList.add('page-link');
          if (i === currentPage) {
              a.classList.add('active');
          }

          a.addEventListener('click', function (e) {
              e.preventDefault();
              currentPage = i;
              updateTableAndPagination();
          });

          pagination.appendChild(a);
      }

      const next = document.createElement('a');
      next.textContent = 'Next';
      next.href = '#';
      next.classList.add('page-link');
      next.classList.add('next');
      next.addEventListener('click', function (e) {
          e.preventDefault();
          if (currentPage < totalPages) {
              currentPage++;
              updateTableAndPagination();
          }
      });
      if(totalPages > 2)
      pagination.appendChild(next);
  }

  function updateTableAndPagination() {
      displayTableData(currentPage);
      displayPagination();
  }

  updateTableAndPagination();
});

$(document).ready(function() {
  $('.js-example-tags').select2({
      placeholder: "Select Resident",
      allowClear: true,
      dropdownParent: $('#bgyCertificate')
  });
});

function file_changed(){
  var selectedFile = document.getElementById('input').files[0];
  var img = document.getElementById('img')

  var reader = new FileReader();
  reader.onload = function(){
     img.src = this.result
  }
  reader.readAsDataURL(selectedFile);
 }